@extends('admin.layout.admin')

@section('title', 'Admin Edit Order')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Order</h2>
        <a href="/admin/orders" class="btn btn-dark">Back</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p class="mb-0">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <h5>Order Details</h5>
            <p><strong>User:</strong> {{ $order->user->name ?? '' }}</p>
            <p><strong>Total:</strong> ${{ number_format($order->total_price, 2) }}</p>
            <p><strong>Date:</strong> {{ $order->created_at->format('d.m.Y') }}</p>

            <h5 class="mt-3">Products</h5>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name ?? '' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->price, 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <form method="POST" action="/admin/orders/{{ $order->id }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update Order</button>
    </form>
@endsection
