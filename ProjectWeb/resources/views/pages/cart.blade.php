@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 px-4">
    <div class="flex flex-col md:flex-row shadow-md my-10 bg-white rounded-lg overflow-hidden">
        
        <div class="w-full md:w-3/4 bg-white px-10 py-10">
            <div class="flex justify-between border-b pb-8">
                <h1 class="font-semibold text-2xl">Giỏ hàng</h1>
                <h2 class="font-semibold text-2xl">{{ count(session('cart', [])) }} Sản phẩm</h2>
            </div>

            <div class="flex mt-10 mb-5">
                <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Chi tiết sản phẩm</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Số lượng</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Giá</h3>
                <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Tổng</h3>
            </div>

            @php $total = 0; @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    
                    <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                        <div class="flex w-2/5"> 
                            <div class="w-20">
                                <img class="h-20 w-20 object-cover rounded" 
                                    src="{{ Str::startsWith($details['image'], 'http') ? $details['image'] : asset($details['image']) }}" 
                                    alt="{{ $details['name'] }}">
                            </div>
                            <div class="flex flex-col justify-between ml-4 flex-grow">
                                <span class="font-bold text-sm">{{ $details['name'] }}</span>
                                <span class="text-red-500 text-xs">{{ $details['series'] ?? 'Gundam' }}</span>
                                <a href="{{ route('cart.remove', $id) }}" onclick="return confirm('Xóa sản phẩm này?')" class="font-semibold hover:text-red-500 text-gray-500 text-xs mt-2 cursor-pointer">
                                    <i class="fa fa-trash"></i> Xóa
                                </a>
                            </div>
                        </div>

                        <div class="flex justify-center w-1/5">
                        <input class="mx-2 border text-center w-16 rounded update-cart" 
                            type="number" 
                            min="1" 
                            value="{{ $details['quantity'] }}" 
                            data-id="{{ $id }}">
                        </div>

                        <span class="text-center w-1/5 font-semibold text-sm">{{ number_format($details['price']) }}₫</span>

                        <span class="text-center w-1/5 font-semibold text-sm">{{ number_format($details['price'] * $details['quantity']) }}₫</span>
                    </div>
                @endforeach
            @else
                <div class="text-center py-10 text-gray-500">
                    Giỏ hàng đang trống!
                </div>
            @endif

            <a href="{{ route('home') }}" class="flex font-semibold text-indigo-600 text-sm mt-10">
                <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
                    <path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/>
                </svg>
                Tiếp tục mua sắm
            </a>
        </div>

        <div id="summary" class="w-full md:w-1/4 px-8 py-10 bg-gray-100">
            <h1 class="font-semibold text-2xl border-b pb-8">Tổng đơn hàng</h1>
            
            <div class="flex justify-between mt-10 mb-5">
                <span class="font-semibold text-sm uppercase">Tổng tiền hàng</span>
                <span class="font-semibold text-sm">{{ number_format($total) }}₫</span>
            </div>
            
            <div class="flex justify-between mt-5 mb-5">
                <span class="font-semibold text-sm uppercase">Phí vận chuyển</span>
                <span class="font-semibold text-sm text-green-600">Miễn phí</span>
            </div>

            <div class="border-t mt-8">
                <div class="flex font-semibold justify-between py-6 text-sm uppercase">
                    <span>Thành tiền</span>
                    <span class="text-xl text-red-600">{{ number_format($total) }}₫</span>
                </div>
                
                @if(session('cart') && count(session('cart')) > 0)
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-indigo-600 font-semibold hover:bg-indigo-700 py-3 text-sm text-white uppercase w-full rounded hover:shadow-lg transition duration-300">
                            Thanh toán ngay
                        </button>
                    </form>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    // Lắng nghe sự kiện khi thay đổi ô input
    const inputs = document.querySelectorAll('.update-cart');

    inputs.forEach(input => {
        input.addEventListener('change', function() {
            // Lấy id sản phẩm và số lượng mới
            const id = this.getAttribute('data-id');
            const quantity = this.value;

            // Nếu nhập số <= 0 thì ép về 1
            if(quantity < 1) {
                this.value = 1;
                return;
            }

            // Gửi dữ liệu lên Server
            // LƯU Ý: Dùng dấu nháy kép " bên trong route để không bị lỗi
            fetch('{{ route("cart.update") }}', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ id: id, quantity: quantity })
            })
            .then(response => {
                // Nếu server trả về OK thì mới load lại trang
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert('Cập nhật thất bại, vui lòng thử lại!');
                }
            })
            .catch(error => {
                console.error('Lỗi:', error);
            });
        });
    });
</script>
@endpush
