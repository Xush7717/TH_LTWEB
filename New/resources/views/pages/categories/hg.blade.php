@extends('layouts.app')

@section('title', 'High Grade (HG) - TBShop')

@section('content')
<section class="main-content">
    <section class="new-arrivals-section">
        <h2>Danh sách sản phẩm HG</h2>
        <div class="products-list">
            <div class="product-card">
                <img src="{{ asset('images/products/hg_calibarn.jpg') }}" alt="HG Calibarn">
                <div class="product-info">
                    <h3>HG Calibarn</h3>
                    <div class="price-container">
                        <span class="product-price">500,000₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/products/hg_lfrith.jpg') }}" alt="HG Lfrith">
                <div class="product-info">
                    <h3>HG Lfrith</h3>
                    <div class="price-container">
                        <span class="product-price">380,000₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/products/hg_gquuuuuux.jpg') }}" alt="HG Gquuuuuux">
                <div class="product-info">
                    <h3>HG Gquuuuuux</h3>
                    <div class="price-container">
                        <span class="product-price">600,000₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/products/hg_mighty-strike-freedom.jpg') }}" alt="HG Mighty Strike Freedom">
                <div class="product-info">
                    <h3>HG Mighty Strike Freedom</h3>
                    <div class="price-container">
                        <span class="product-price">650,000₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
