@extends('admin.layout.admin')

@section('title', 'Admin Edit Category')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Category</h2>
        <a href="/admin/categories" class="btn btn-dark">Back</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/admin/categories/{{ $category->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
        </div>
        <button type="submit" class="btn btn-warning">Update Category</button>
    </form>
@endsection
