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

        // 6. Quay lại trang cũ và báo thành công
        return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
    }
}