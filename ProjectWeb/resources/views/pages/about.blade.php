@extends('layouts.app')

@section('title', 'Về Chúng Tôi - TBShop')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/custom/about.css') }}">
@endpush

@section('content')
<div class="left-section">
    <img src="{{ asset('images/categories/rg.jpg') }}" alt="Banner 1">
</div>
<div class="right-section">
    <h2>TBShop</h2>
    <p>TBShop là một website bán model kit thuộc đồ án thực hành nhập môn web trường đại học Công nghệ Sài Gòn</p>
    <p>Thị trường model kit tại Việt Nam và trên thế giới đang ngày càng phát triển, với lượng người chơi gia tăng, đặc biệt là giới trẻ và người yêu thích mô hình tĩnh.
        Tuy nhiên, việc tiếp cận sản phẩm chất lượng, chính hãng còn gặp khó khăn do thiếu nền tảng mua sắm trực tuyến chuyên biệt.
        Vì vậy, xây dựng một website bán model kit sẽ góp phần giải quyết nhu cầu đó, mang đến cho người dùng trải nghiệm mua sắm tiện lợi, nhanh chóng và đáng tin cậy.</p>
    <p>Bên cạnh thị trường đầy tiềm năng, đam mê, sự yêu thích của em đối với model kit cũng là một yếu tố quan trọng thúc đẩy em lựa chọn đề tài này.
        Việc xây dựng và quản lý website giúp em học hỏi thêm nhiều kiến thức mới về lập trình, marketing, các bố trí các bố cục để thu hút người mua cũng như khiến họ cảm thấy thoải mái khi lựa chọn mẫu mô hình yêu thích của mình.
    </p>
    <h2>Các chức năng đã thực hiện</h2>
    <ul>
        <li>- Tương thích với thiết bị di động</li>
        <li>- Chức năng hiển thị chi tiết sản phẩm (4 sản phẩm bán chạy)</li>
        <li>- Hiệu ứng hover</li>
        <li>- Trang đăng nhập</li>
        <li>- Trang đăng kí</li>
        <li>- Footer với các thông tin liên hệ và bản đồ</li>
        <li>- Chức năng lọc sản phẩm theo grade</li>
        <li>- Tích hợp Laravel framework với MVC architecture</li>
        <li>- Blade templating system để tái sử dụng code</li>
    </ul>
</div>
@endsection
