@extends('layouts.admin')

@section('title', 'Edit Category')

@section('page-title', 'Edit Category')

@section('content')
<div class="content-card">
    <div class="content-card-header">
        <h2>Update Category Information</h2>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">Category Name *</label>
            <input type="text" id="name" name="name" class="form-input" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-textarea">{{ old('description', $category->description) }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="scale" class="form-label">Scale (e.g., 1/144, 1/100)</label>
            <select id="scale" name="scale" class="form-input">
                <option value="">-- Select Scale --</option>
                <option value="1/144" {{ old('scale', $category->scale) == '1/144' ? 'selected' : '' }}>1/144</option>
                <option value="1/100" {{ old('scale', $category->scale) == '1/100' ? 'selected' : '' }}>1/100</option>
                <option value="1/60" {{ old('scale', $category->scale) == '1/60' ? 'selected' : '' }}>1/60</option>
                <option value="Non-scale" {{ old('scale', $category->scale) == 'Non-scale' ? 'selected' : '' }}>Non-scale</option>
            </select>
            @error('scale')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
