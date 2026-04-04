@extends('admin.layout.admin')

@section('title', 'Admin Categories')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Categories</h2>
        <a href="/admin/categories/create" class="btn btn-success">Add Category</a>
    </div>



    <table class="table table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="/admin/categories/{{ $category->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="/admin/categories/{{ $category->id }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3">No categories found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
