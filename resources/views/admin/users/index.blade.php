@extends('admin.layout.admin')

@section('title', 'Admin Users')


@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Users</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Phone</th>
            <th>City</th>
            <th>Country</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name ?? '' }}</td>
                <td>{{ $user->phone ?? '-' }}</td>
                <td>{{ $user->city ?? '-' }}</td>
                <td>{{ $user->country ?? '-' }}</td>
                <td>
                    <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="/admin/users/{{ $user->id }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="8">No users found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
