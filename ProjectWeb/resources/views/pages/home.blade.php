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
        <a href="{{ route('product.detail', $product->id) }}">
            <div class="product-card">
                <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}">
                <div class="product-info">
                    <h3>{{ $product->name }}</h3>
                    <div class="price-container">
                        <span class="product-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                    </div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="slider-controls">
        <button class="slider-btn prev">←</button>
        <button class="slider-btn next">→</button>
    </div>
</section>

<section class="main-content">
    <section class="new-arrivals-section" id="products">
        <h2>Danh sách sản phẩm</h2>
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
