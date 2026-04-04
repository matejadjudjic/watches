@extends('admin.layout.admin')

@section('title', 'Admin Create Brand')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Add Brand</h2>
        <a href="/admin/brands" class="btn btn-dark">Back</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/admin/brands">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label>Country</label>
            <input type="text" name="country" class="form-control" value="{{ old('country') }}">
        </div>
        <div class="mb-3">
            <label>Founded Year</label>
            <input type="number" name="founded_year" class="form-control" value="{{ old('founded_year') }}">
        </div>
        <button type="submit" class="btn btn-success">Add Brand</button>
    </form>
@endsection
