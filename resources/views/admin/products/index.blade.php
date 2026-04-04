@extends('admin.layout.admin')

@section('title', 'Admin Products')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Products</h2>
        <a href="/admin/products/create" class="btn btn-success">Add Product</a>
    </div>



    <table class="table table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Ref. Number</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->brand->name ?? '' }}</td>
                <td>{{ $product->category->name ?? '' }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>{{ $product->discount ? '$' . number_format($product->discount, 2) : '-' }}</td>
                <td>{{ $product->reference_number }}</td>
                <td>
                    <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="/admin/products/{{ $product->id }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="8">No products found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
