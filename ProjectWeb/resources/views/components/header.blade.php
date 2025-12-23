<header class="main-header">
    <div class="header-top-bar">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logos/Logo.png') }}" alt="Logo" class="site-logo">
        </a>
        <form class="header-search" action="{{ route('search') }}" method="GET">
            <input type="text" name="q" placeholder="Tìm kiếm...">
            <button type="submit">Tìm kiếm</button>
        </form>
        {{-- PHẦN XỬ LÝ ĐĂNG NHẬP / TÀI KHOẢN --}}
            
           <div class="header-icons">

    @guest
        <a href="{{ route('login') }}" class="header-icon login-icon" title="Đăng nhập">
            <span class="icon-user"></span> Đăng nhập
        </a>
    @endguest

    @auth
        <div class="user-dropdown-container">
            <a href="#" class="user-name-link">
                <span class="icon-user"></span> 
                Hello, <strong>{{ Auth::user()->name ?? Auth::user()->full_name }}</strong>
                <span class="arrow-down">▼</span>
            </a>

            <ul class="custom-dropdown-menu">
                <li><a href="#">Quản lý tài khoản</a></li>
                <li><a href="#">Đơn hàng của tôi</a></li>
                <li class="divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </div>
    @endauth

            {{-- Kết thúc phần xử lý tài khoản --}}
        <!-- <div class="header-icons">
            <a href="{{ route('login') }}" class="header-icon login-icon" title="Đăng nhập">
                <span class="icon-user"></span> Đăng nhập
            </a> -->
            <a href="{{ route('cart.index') }}" class="header-icon cart-icon" title="Giỏ hàng">
                <span class="icon-cart">
                    <span id="cart-count" class="cart-badge">
                        {{ count(session('cart', [])) }}
                    </span>
                </span> Giỏ hàng
            </a>
        </div>
    </div>
    <nav class="main-nav main-nav-bar">
        <button class="menu-toggle">
            <span>Menu</span>
            <span class="icon-menu"></span>
        </button>
        <ul>
            <li class="nav-category">
                <span class="icon-menu"></span> Danh mục sản phẩm <span class="icon-down"></span>
                <div class="category-dropdown">
                    <ul>
                        <li>
                            <a href="{{ route('category.hg') }}">
                                <img src="{{ asset('images/categories/HighGrade.jpg') }}" alt="HG" class="category-icon">
                                <span>High Grade (HG)</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.rg') }}">
                                <img src="{{ asset('images/categories/RealGrade.jpg') }}" alt="RG" class="category-icon">
                                <span>Real Grade (RG)</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.mg') }}">
                                <img src="{{ asset('images/categories/MasterGrade.jpg') }}" alt="MG" class="category-icon">
                                <span>Master Grade (MG)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li><a href="{{ route('home') }}">TRANG CHỦ</a></li>
            <li><a href="#products">CỬA HÀNG</a></li>
            <li><a href="#contact">LIÊN HỆ</a></li>
            <li><a href="{{ route('about') }}">VỀ CHÚNG TÔI</a></li>
            <li><a href="{{ route('labs') }}">LAB THỰC HÀNH</a></li>
        </ul>
    </nav>
</header>
