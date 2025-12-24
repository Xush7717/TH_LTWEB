    @extends('layouts.app')

    @section('title', $product['name'] ?? 'Chi tiết sản phẩm' . ' - TBShop')

    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom/product_detail.css') }}">
    @endpush

    @section('content')
    <section class="product-detail">
        <div class="product-detail-container">
            <div class="product-image">
                <img src="{{ !empty($product->thumbnail) ? $product->thumbnail : asset('images/products/default.jpg') }}" 
     alt="{{ $product->name ?? 'Sản phẩm' }}">
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
                <div class="product-actions" style="margin-top: 20px;">
    
    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-warning btn-add-cart"
       style="padding: 10px 20px; background-color: #fff; color: #28a745; border: 1px solid #28a745; text-decoration: none; border-radius: 4px; font-weight: bold; margin-right: 10px;">
        Thêm vào giỏ
    </a>

    <a href="{{ route('cart.buyNow', $product->id) }}" 
       style="padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;">
        Mua ngay
    </a>

</div>
            </div>
        </div>
    </section>
    @endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Bắt sự kiện khi bấm nút có class .btn-add-cart
        $('.btn-add-cart').click(function(e) {
            e.preventDefault(); // 1. Ngăn không cho chuyển trang

            let url = $(this).attr('href'); // 2. Lấy đường dẫn thêm giỏ hàng

            // 3. Gửi yêu cầu ngầm (AJAX)
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json', // Mong đợi server trả về JSON
                success: function(data) {
                    // Nếu Controller trả về success
                    if(data.status == 'success') {
                        // Cập nhật số trên Header (tìm id="cart-count")
                        $('#cart-count').text(data.count);
                        
                        // Thông báo cho người dùng
                        alert(data.message);
                    } else {
                        // Dự phòng: Nếu không phải JSON, chuyển trang bình thường
                        window.location.href = url;
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Lỗi:", error);
                    // Nếu lỗi quá thì chuyển trang luôn cho chắc
                    window.location.href = url;
                }
            });
        });
    });
</script>
@endpush