@extends('admin.layout.admin')

@section('title', 'Admin Brands')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Brands</h2>
        <a href="/admin/brands/create" class="btn btn-success">Add Brand</a>
    </div>



    <table class="table table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Country</th>
            <th>Founded Year</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($brands as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->country ?? '-' }}</td>
                <td>{{ $brand->founded_year ?? '-' }}</td>
                <td>
                    <a href="/admin/brands/{{ $brand->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="/admin/brands/{{ $brand->id }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">No brands found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
