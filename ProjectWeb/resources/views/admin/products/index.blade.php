@extends('layouts.admin')

@section('title', 'Products')

@section('page-title', 'Products Management')

@section('content')
<div class="content-card">
    <div class="content-card-header">
        <h2>All Products</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New Product</a>
    </div>

    @if($products->count() > 0)
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Scale</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @if($product->thumbnail)
                            <img src="{{ $product->thumbnail }}" alt="{{ $product->name }}" class="table-thumbnail" onerror="this.style.display='none'; this.nextElementSibling.style.display='inline';">
                            <span class="text-muted" style="display: none;">No image</span>
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td>{{ $product->category->scale ?? 'N/A' }}</td>
                    <td>{{ number_format($product->price, 0) }} ₫</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-20">
            {{ $products->links() }}
        </div>
    @else
        <div class="no-data">
            <p>No products found. Add your first product!</p>
        </div>
    @endif
</div>
@endsection
