@extends('layouts.app')

@section('title', $product['name'] ?? 'Chi tiết sản phẩm' . ' - TBShop')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/custom/product_detail.css') }}">
@endpush

@section('content')
<section class="product-detail">
    <div class="product-detail-container">
        <div class="product-image">
            <img src="{{ asset($product['image'] ?? 'images/products/default.jpg') }}" alt="{{ $product['name'] ?? 'Product' }}">
        </div>
        <div class="product-details">
            <h1>{{ $product['name'] ?? 'Product Name' }}</h1>
            <div class="product-price">{{ $product['price'] ?? '0' }}₫</div>
            <div class="product-description">
                <h3>Mô tả sản phẩm</h3>
                <p>{{ $product['description'] ?? 'No description available' }}</p>
            </div>
            <div class="product-specs">
                <h3>Thông số</h3>
                <ul>
                    <li><strong>Grade:</strong> {{ $product['grade'] ?? 'N/A' }}</li>
                    <li><strong>Scale:</strong> {{ $product['scale'] ?? '1/144' }}</li>
                    <li><strong>Series:</strong> {{ $product['series'] ?? 'Gundam' }}</li>
                </ul>
            </div>
            <div class="product-actions">
                <button class="btn-add-cart">Thêm vào giỏ hàng</button>
                <button class="btn-buy-now">Mua ngay</button>
            </div>
        </div>
    </div>
</section>
@endsection
