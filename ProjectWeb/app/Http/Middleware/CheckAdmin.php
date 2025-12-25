<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
        
        // 2. Kiểm tra xem role có phải là admin không
        if (Auth::user()->role == 'admin') {
            return $next($request); // Cho qua
        }
    }

    // Nếu không phải Admin -> Đá về trang chủ và báo lỗi
    return redirect('/')->with('error', 'Bạn không có quyền truy cập trang quản trị!');
    }
}
