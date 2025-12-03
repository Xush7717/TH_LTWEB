@extends('layouts.admin')

@section('title', 'Create Category')

@section('page-title', 'Create New Category')

@section('content')
<div class="content-card">
    <div class="content-card-header">
        <h2>Category Information</h2>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back to List</a>
    </div>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Category Name *</label>
            <input type="text" id="name" name="name" class="form-input" value="{{ old('name') }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-textarea">{{ old('description') }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Create Category</button>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
