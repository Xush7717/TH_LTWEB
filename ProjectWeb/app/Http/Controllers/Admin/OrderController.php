    <?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Order;
    //use Illuminate\Container\Attributes\DB;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use App\Models\OrderDetail;

    class OrderController extends Controller
    {
        public function index()
        {
            $orders = Order::with('user')->latest('order_date')->paginate(20);
            return view('admin.orders.index', compact('orders'));
        }

        public function show(Order $order)
        {
            $order->load(['user', 'orderDetails.product']);
            return view('admin.orders.show', compact('order'));
        }

        public function updateStatus(Request $request, Order $order)
        {
            $validated = $request->validate([
                'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
            ]);

            $order->update(['status' => $validated['status']]);

            return redirect()->route('admin.orders.show', $order)
                ->with('success', 'Order status updated successfully.');
        }

        public function destroy(Order $order)
        {
            $order->delete();

            return redirect()->route('admin.orders.index')
                ->with('success', 'Order deleted successfully.');
        }
        public function checkout(Request $request)
        {
            // 1. Lấy giỏ hàng từ Session
            $cart = session()->get('cart');

            if (!$cart) {
                return redirect()->back()->with('error', 'Giỏ hàng trống!');
            }

            // 2. Tính tổng tiền
            $totalMoney = 0;
            foreach ($cart as $item) {
                $totalMoney += $item['price'] * $item['quantity'];
            }

            // 3. Dùng Transaction để đảm bảo an toàn dữ liệu
            DB::beginTransaction();
            try {
                // A. Tạo đơn hàng (Bảng orders)
                $order = Order::create([
                    'user_id' => Auth::id() ?? null, // Nếu đăng nhập thì lấy ID, không thì null
                    'full_name' => $request->full_name,
                    'phone_number' => $request->phone_number,
                    'shipping_address' => $request->shipping_address,
                    'note' => $request->note,
                    'total_money' => $totalMoney,
                    'status' => 'pending',
                    'payment_method' => $request->payment_method ?? 'COD'
                ]);

                // B. Tạo chi tiết đơn hàng (Bảng order_details)
                foreach ($cart as $productId => $item) {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $productId,
                        'price' => $item['price'],
                        'quantity' => $item['quantity'],
                    ]);
                }

                // C. Xóa giỏ hàng và Commit
                session()->forget('cart');
                DB::commit();

                return redirect()->route('home')->with('success', 'Đặt hàng thành công!');

            } catch (\Exception $e) {
                DB::rollBack();
                // In lỗi ra để debug nếu cần: dd($e->getMessage());
                return redirect()->back()->with('error', 'Có lỗi xảy ra khi đặt hàng.');
            }
        }
    }
