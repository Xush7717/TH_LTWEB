@extends('layouts.app')

@section('title', 'Đăng nhập - TBShop')

@section('content')
<div class="login-container">
    <h2>Đăng nhập</h2>
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Tên người dùng hoặc Email:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn-login">Đăng nhập</button>
        <p class="register-link">Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
    </form>
</div>
@endsection
