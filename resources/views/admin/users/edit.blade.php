@extends('admin.layout.admin')

@section('title', 'Admin Edit User')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit User</h2>
        <a href="/admin/users" class="btn btn-dark">Back</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/admin/users/{{ $user->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role_id" class="form-control">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update User</button>
    </form>
@endsection
