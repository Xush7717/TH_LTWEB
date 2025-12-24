@extends('layouts.app')

@section('title', 'TB Shop - Trang Chủ')

@section('content')
<section class="hero-slider">
    <div class="slider-wrapper">
        <div class="slide active"><img src="{{ asset('images/sliders/slider1.jpg') }}" alt="Slide 1"></div>
        <div class="slide"><img src="{{ asset('images/sliders/slider2.jpg') }}" alt="Slide 2"></div>
        <div class="slide"><img src="{{ asset('images/sliders/slider3.jpg') }}" alt="Slide 3"></div>
        <div class="slide"><img src="{{ asset('images/sliders/slider5.jpg') }}" alt="Slide 4"></div>
        <button class="slider-btn prev">&#10094;</button>
        <button class="slider-btn next">&#10095;</button>
    </div>
    <div class="slider-dots">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</section>

<section class="featured-products">
    <h2>Sản phẩm nổi bật</h2>
    <div class="products-list">
        @foreach ($featuredProducts as $product)
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
        @endforeach
    </div>
    <div class="slider-controls">
        <button class="slider-btn prev">←</button>
        <button class="slider-btn next">→</button>
    </div>
</section>

<section class="main-content">
    <section class="new-arrivals-section" id="products">
        <!-- Section Header with Flex Layout -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="margin: 0;">Danh sách sản phẩm</h2>
            <a href="{{ route('products.index') }}" class="view-all-link" style="font-size: 14px; padding: 8px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; font-weight: 500; transition: background-color 0.3s; display: inline-block;">
                Xem tất cả →
            </a>
        </div>

        <!-- Product Grid -->
        <div class="products-list">
            @foreach ($newArrivals as $product)
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
            @endforeach
        </div>
    </section>
</section>
@endsection

@push('page-styles')
<style>
    .view-all-link:hover {
        background-color: #0056b3 !important;
        transform: translateX(2px);
    }

    .view-all-link:active {
        transform: scale(0.98);
    }
</style>
@endpush

@push('page-scripts')
<script>
    // Enhanced slider JS
    let currentSlide = 0;
    let isAnimating = false;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.querySelector('.slider-btn.prev');
    const nextBtn = document.querySelector('.slider-btn.next');

    function showSlide(idx, direction = 'next') {
        if (isAnimating) return;
        isAnimating = true;

        const currentEl = slides[currentSlide];
        const nextEl = slides[idx];

        // Update dots
        dots.forEach((d, i) => d.classList.toggle('active', i === idx));

        // Change slides
        currentEl.classList.remove('active');
        nextEl.classList.add('active');

        // Reset animation lock after transition
        setTimeout(() => {
            currentSlide = idx;
            isAnimating = false;
        }, 800);
    }

    function nextSlide() {
        showSlide((currentSlide + 1) % slides.length, 'next');
    }

    function prevSlide() {
        showSlide((currentSlide - 1 + slides.length) % slides.length, 'prev');
    }

    // Event listeners
    prevBtn.onclick = prevSlide;
    nextBtn.onclick = nextSlide;
    dots.forEach((d, i) => d.onclick = () => showSlide(i));

    // Auto advance
    let slideInterval = setInterval(nextSlide, 5000);

    // Pause auto-advance on hover
    const slider = document.querySelector('.hero-slider');
    slider.addEventListener('mouseenter', () => clearInterval(slideInterval));
    slider.addEventListener('mouseleave', () => {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, 5000);
    });
</script>
@endpush