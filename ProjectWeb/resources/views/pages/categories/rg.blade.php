@extends('layouts.app')

@section('title', 'Real Grade (RG) - TBShop')

@section('content')
<section class="main-content">
    <section class="new-arrivals-section">
        <h2>Danh sách sản phẩm RG</h2>
        <div class="products-list">
            <div class="product-card">
                <img src="{{ asset('images/products/rg_astray.jpg') }}" alt="RG Astray">
                <div class="product-info">
                    <h3>RG Astray Red Frame</h3>
                    <div class="price-container">
                        <span class="product-price">560,000₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/products/rg_rx-78-2.jpg') }}" alt="RX-78-2 Gundam">
                <div class="product-info">
                    <h3>RG RX-78-2 2.0</h3>
                    <div class="price-container">
                        <span class="product-price">1,100,000₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/products/rg_God-Gundam.jpg') }}" alt="RG God Gundam">
                <div class="product-info">
                    <h3>RG God Gundam</h3>
                    <div class="price-container">
                        <span class="product-price">750,000₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/products/rg_unicorn.jpg') }}" alt="RG Unicorn">
                <div class="product-info">
                    <h3>RG Unicorn</h3>
                    <div class="price-container">
                        <span class="product-price">780,000₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
