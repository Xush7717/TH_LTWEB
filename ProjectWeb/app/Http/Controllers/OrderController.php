<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        // 1. Kiểm tra giỏ hàng có hàng không
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->back()->with('error', 'Giỏ hàng trống! Vui lòng chọn sản phẩm.');
        }

        // 2. Validate dữ liệu người dùng nhập
        $request->validate([
            'full_name' => 'required',
            'phone_number' => 'required',
            'shipping_address' => 'required',
        ]);

        // 3. Tính tổng tiền
        $totalMoney = 0;
        foreach ($cart as $item) {
            $totalMoney += $item['price'] * $item['quantity'];
        }

        // 4. Bắt đầu lưu vào Database (Dùng Transaction để an toàn)
        DB::beginTransaction();
        try {
            // A. Lưu thông tin chung đơn hàng (Bảng orders)
            $order = Order::create([
                'user_id' => Auth::id() ?? null, // Nếu khách chưa đăng nhập thì lưu null
                'full_name' => $request->full_name,
                'phone_number' => $request->phone_number,
                'shipping_address' => $request->shipping_address,
                'note' => $request->note,
                'total_money' => $totalMoney,
                'payment_method' => $request->payment_method ?? 'COD', // Mặc định là COD
                'status' => 'pending' // Trạng thái chờ xử lý
            ]);

            // B. Lưu chi tiết từng sản phẩm (Bảng order_details)
            foreach ($cart as $productId => $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    // 'total_price' => $item['price'] * $item['quantity'] // Nếu bảng bạn có cột này thì mở ra
                ]);
            }

            // 5. Nếu lưu thành công thì Xóa giỏ hàng
            session()->forget('cart');

            // Xác nhận giao dịch
            DB::commit();

            return redirect()->route('home')->with('success', 'Đặt hàng thành công! Chúng tôi sẽ liên hệ sớm.');
        } catch (\Exception $e) {
            // Nếu có lỗi thì hủy bỏ mọi thay đổi
            DB::rollBack();

            // Debug lỗi (nếu cần thì mở dòng dd($e->getMessage()) ra để xem)
            // dd($e->getMessage());

            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xử lý đơn hàng, vui lòng thử lại.');
        }
    }
}
