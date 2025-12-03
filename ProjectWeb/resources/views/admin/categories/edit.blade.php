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

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Category</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
