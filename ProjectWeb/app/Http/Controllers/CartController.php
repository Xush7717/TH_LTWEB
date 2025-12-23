<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Nhớ gọi Model Product

class CartController extends Controller
{
    public function addToCart($id)
    {
        // 1. Tìm sản phẩm theo ID
        $product = Product::findOrFail($id);

        // 2. Lấy giỏ hàng hiện tại từ Session (nếu chưa có thì tạo mảng rỗng)
        $cart = session()->get('cart', []);

        // 3. Kiểm tra: Nếu sản phẩm đã có trong giỏ -> Tăng số lượng
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // 4. Nếu chưa có -> Thêm mới vào mảng
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image // Đảm bảo bảng products có cột image
            ];
        }

        // 5. Lưu lại vào Session
        session()->put('cart', $cart);
        // Kiểm tra nếu là yêu cầu từ AJAX (JavaScript)
        if (request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'count' => count($cart), // Trả về tổng số sản phẩm
                'message' => 'Đã thêm ' . $product->name . ' vào giỏ!'
            ]);
        }

        // 6. Quay lại trang cũ và báo thành công
        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }
    public function buyNow($id)
    {
        // Gọi lại logic thêm vào giỏ ở trên (để đỡ phải viết lại code)
        // Lưu ý: Cần sửa logic session một chút hoặc copy code lại nếu gọi hàm bị lỗi redirect
        
        // --- Copy logic thêm vào giỏ ---
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        // -------------------------------

        // QUAN TRỌNG: Chuyển hướng thẳng đến trang Giỏ hàng
        return redirect()->route('cart.index'); 
    }
    public function index()
    {
        // Lấy giỏ hàng từ Session
        $cart = session()->get('cart', []);

        // Tính tổng tiền
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Trả về View giỏ hàng
        return view('pages.cart', compact('cart', 'total'));
    }
    public function update(Request $request)
    {
        // Kiểm tra xem có dữ liệu id và quantity gửi lên không
        if($request->id && $request->quantity){
            
            // Lấy giỏ hàng hiện tại
            $cart = session()->get('cart');

            // Cập nhật số lượng cho đúng sản phẩm đó
            $cart[$request->id]['quantity'] = $request->quantity;

            // Lưu ngược lại vào Session
            session()->put('cart', $cart);

            // Báo thành công (để JS biết đường load lại trang)
            return response()->json(['success' => true]);
        }
    }
}