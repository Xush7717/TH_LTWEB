@extends('layouts.app')

@section('title', ($title ?? 'Tất cả sản phẩm') . ' - TB Shop')

@section('content')
<section class="products-page">
    <div class="container-centered">
        <h1 class="page-title">{{ $title ?? 'Tất cả sản phẩm' }}</h1>

        <div class="product-grid-wrapper">
            @forelse ($products as $product)
                <div class="product-card">
                    <a href="{{ route('product.detail', $product->id) }}">
                        <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}">
                    </a>
                    <div class="product-info">
                        <a href="{{ route('product.detail', $product->id) }}">
                            <h3>{{ $product->name }}</h3>
                        </a>
                        <div class="price-container">
                            <span class="product-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                        </div>
                        <a href="{{ route('cart.add', $product->id) }}" class="add-to-cart">Thêm vào giỏ</a>
                    </div>
                </div>
            @empty
            <p class="no-products-message">Không có sản phẩm nào.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection
