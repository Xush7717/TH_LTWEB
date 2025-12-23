<header class="main-header">
    <div class="header-top-bar">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logos/Logo.png') }}" alt="Logo" class="site-logo">
        </a>
        <form class="header-search" action="{{ route('search') }}" method="GET">
            <input type="text" name="q" placeholder="Tìm kiếm...">
            <button type="submit">Tìm kiếm</button>
        </form>
        <div class="header-icons">
            <a href="{{ route('login') }}" class="header-icon login-icon" title="Đăng nhập">
                <span class="icon-user"></span> Đăng nhập
            </a>
            <a href="#cart" class="header-icon cart-icon" title="Giỏ hàng">
                <span class="icon-cart">
                    <span class="cart-badge">0</span>
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
