@extends('admin.layout.admin')

@section('title', 'Admin Orders')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Orders</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Summary</th>
            <th>Status</th>
            <th>Date</th>
            <th>Products</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name ?? '' }}</td>
                <td>${{ number_format($order->total_price, 2) }}</td>
                <td>
                    <span class="badge {{ $order->status == 'pending' ? 'bg-warning' : 'bg-success' }}">
                        {{ $order->status }}
                    </span>
                </td>
                <td>{{ $order->created_at->format('d.m.Y') }}</td>
                <td>
                    @foreach($order->items as $item)
                        <small>{{ $item->product->name ?? '' }} ({{ $item->quantity }}x)</small><br>
                    @endforeach
                </td>
                <td>
                    <a href="/admin/orders/{{ $order->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="/admin/orders/{{ $order->id }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">There are no orders.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
