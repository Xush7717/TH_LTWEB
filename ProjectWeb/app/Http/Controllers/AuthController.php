<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;       
//use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use App\Models\User; // Gọi Model User để thêm người dùng
use Illuminate\Support\Facades\Hash; // Gọi thư viện để mã hóa mật khẩu

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        // TODO: Implement actual login logic
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        // Nếu bạn muốn đăng nhập bằng Email thì sửa dòng trên thành: 'email' => $request->username

        if (Auth::attempt($credentials)) {
            // A. Đăng nhập thành công -> Tạo lại session
            $request->session()->regenerate();

            // --- B. KIỂM TRA QUYỀN (ROLE) ĐỂ CHUYỂN HƯỚNG ---
            
            // Nếu là Admin
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Chào mừng Admin quay lại!');
            }

            // Nếu là Khách hàng (buyer hoặc user thường)
            return redirect()->route('home')->with('success', 'Đăng nhập thành công!');
        }

        // 3. Đăng nhập thất bại
        return redirect()->back()->with('error', 'Ten dang nhap hoặc mật khẩu không đúng!');
    }

    public function showRegister()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        // TODO: Implement actual registration logic
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);
        //dd($request->all());
        $user = User::create([
            'full_name' => $request->full_name,      // Lưu 'fullname' nhập vào cột 'name'
            'email' => $request->email,        // Lưu email
            'username' => $request->username,  // Lưu username (⚠️ Xem lưu ý bên dưới)
            'password' => Hash::make($request->password), // Quan trọng: Phải mã hóa mật khẩu
        ]);
        //dd($user);
        // For now, just redirect to login
        return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
        
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
   
}

