@extends('layouts.admin')

@section('title', 'Edit Product')

@section('page-title', 'Edit Product')

@section('content')
<div class="content-card">
    <div class="content-card-header">
        <h2>Update Product Information</h2>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group">
                <label for="name" class="form-label">Product Name *</label>
                <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id" class="form-label">Category</label>
                <select id="category_id" name="category_id" class="form-select">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
            <textarea id="description" name="description" class="form-textarea">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="price" class="form-label">Price (VND) *</label>
                <input type="number" id="price" name="price" class="form-input" value="{{ old('price', $product->price) }}" step="0.01" min="0" required>
                @error('price')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock_quantity" class="form-label">Stock Quantity *</label>
                <input type="number" id="stock_quantity" name="stock_quantity" class="form-input" value="{{ old('stock_quantity', $product->stock_quantity) }}" min="0" required>
                @error('stock_quantity')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="scale" class="form-label">Scale</label>
                <input type="text" id="scale" name="scale" class="form-input" value="{{ old('scale', $product->scale) }}" placeholder="e.g., 1/144">
                @error('scale')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="grade" class="form-label">Grade</label>
                <input type="text" id="grade" name="grade" class="form-input" value="{{ old('grade', $product->grade) }}" placeholder="e.g., HG, RG, MG">
                @error('grade')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="manufacturer" class="form-label">Manufacturer</label>
                <input type="text" id="manufacturer" name="manufacturer" class="form-input" value="{{ old('manufacturer', $product->manufacturer) }}" placeholder="e.g., Bandai">
                @error('manufacturer')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="thumbnail" class="form-label">Product Image</label>
            @if($product->thumbnail)
                <div class="image-preview" style="margin-bottom: 10px;">
                    <p class="text-muted">Current Image:</p>
                    <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" style="max-width: 200px; border-radius: 5px;">
                </div>
            @endif
            <input type="file" id="thumbnail" name="thumbnail" class="form-file" accept="image/*" onchange="previewImage(this, 'image-preview')">
            @error('thumbnail')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="image-preview" id="image-preview-container" style="display: none; margin-top: 10px;">
                <p class="text-muted">New Image Preview:</p>
                <img id="image-preview" src="" alt="Preview" style="max-width: 200px; border-radius: 5px;">
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function previewImage(input, previewId) {
        const container = document.getElementById('image-preview-container');
        const preview = document.getElementById(previewId);

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                container.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
@endsection
