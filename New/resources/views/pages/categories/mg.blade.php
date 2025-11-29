@extends('layouts.app')

@section('title', 'Master Grade (MG) - TBShop')

@section('content')
<section class="main-content">
    <section class="new-arrivals-section">
        <h2>Danh sách sản phẩm MG</h2>
        <div class="products-list">
            <div class="product-card">
                <img src="{{ asset('images/products/mg_vidar.jpg') }}" alt="MG Vidar">
                <div class="product-info-mg">
                    <h3>MG Vidar</h3>
                    <div class="price-container">
                        <span class="product-price">1,500,000₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/products/mg_eclipse.jpg') }}" alt="MG Eclipse">
                <div class="product-info-mg">
                    <h3>MG Eclipse</h3>
                    <div class="price-container">
                        <span class="product-price">1,200,000₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/products/mg_build-strike.jpg') }}" alt="MG Build Strike">
                <div class="product-info-mg">
                    <h3>MG Build Strike</h3>
                    <div class="price-container">
                        <span class="product-price">900,000₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
            <div class="product-card">
                <img src="{{ asset('images/products/mgex_strike-freedom.jpg') }}" alt="MGEX Strike Freedom">
                <div class="product-info-mg">
                    <h3>MGEX Strike Freedom</h3>
                    <div class="price-container">
                        <span class="product-price">4,000,000₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
