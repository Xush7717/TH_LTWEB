@extends('layouts.admin')

@section('title', 'Create Product')

@section('page-title', 'Create New Product')

@section('content')
<div class="content-card">
    <div class="content-card-header">
        <h2>Product Information</h2>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group">
                <label for="name" class="form-label">Product Name *</label>
                <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id" class="form-label">Category *</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-textarea">{{ old('description') }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="price" class="form-label">Price (VND) *</label>
                <input type="number" id="price" name="price" class="form-input" value="{{ old('price') }}" step="0.01" min="0" required>
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock_quantity" class="form-label">Stock Quantity *</label>
                <input type="number" id="stock_quantity" name="stock_quantity" class="form-input" value="{{ old('stock_quantity') }}" min="0" required>
                @error('stock_quantity')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="manufacturer" class="form-label">Manufacturer</label>
            <input type="text" id="manufacturer" name="manufacturer" class="form-input" value="{{ old('manufacturer') }}" placeholder="e.g., Bandai">
            @error('manufacturer')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="thumbnail" class="form-label">Product Image URL</label>
            <input type="text" id="thumbnail" name="thumbnail" class="form-input" value="{{ old('thumbnail') }}" placeholder="https://example.com/image.jpg" onchange="previewImage(this)">
            @error('thumbnail')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="image-preview" id="image-preview-container" style="display: none; margin-top: 10px;">
                <p class="text-muted">Preview:</p>
                <img id="image-preview" src="" alt="Preview" style="max-width: 200px; border-radius: 5px;">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Create Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function previewImage(input) {
        const container = document.getElementById('image-preview-container');
        const preview = document.getElementById('image-preview');
        const url = input.value.trim();

        if (url) {
            preview.src = url;
            container.style.display = 'block';

            // Hide preview if image fails to load
            preview.onerror = function() {
                container.style.display = 'none';
            };
        } else {
            container.style.display = 'none';
        }
    }
</script>
@endpush
@endsection
