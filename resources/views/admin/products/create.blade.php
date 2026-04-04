@extends('admin.layout.admin')

@section('title', 'Admin Create Product')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Add Product</h2>
        <a href="/admin/products" class="btn btn-dark">Back</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/admin/products" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label>Short Description</label>
            <input type="text" name="short_description" class="form-control" value="{{ old('short_description') }}">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label>Discount</label>
            <input type="number" step="0.01" name="discount" class="form-control" value="{{ old('discount') }}">
        </div>
        <div class="mb-3">
            <label>Reference Number</label>
            <input type="text" name="reference_number" class="form-control" value="{{ old('reference_number') }}">
        </div>
        <div class="mb-3">
            <label>Brand</label>
            <select name="brand_id" class="form-control">
                <option value="">Select brand</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Category</label>
            <select name="category_id" class="form-control">
                <option value="">Select category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-success">Add Product</button>
    </form>
@endsection
