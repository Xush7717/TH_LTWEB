@extends('layouts.app')

@section('title', 'Đăng ký - TBShop')

@section('content')
<div class="login-container">
    <h2>Đăng ký tài khoản</h2>
    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="fullname">Họ và tên:</label>
            <input type="text" id="fullname" name="fullname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="username">Tên người dùng:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Xác nhận mật khẩu:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn-login">Đăng ký</button>
        <p class="register-link">Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập ngay</a></p>
    </form>
</div>
@endsection
