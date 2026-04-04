@extends('admin.layout.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dashboard - Activity Log</h2>
    </div>


    <form method="GET" action="/admin/dashboard" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-dark">Filter</button>
                <a href="/admin/dashboard" class="btn btn-secondary">Reset</a>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Action</th>
            <th>Message</th>
            <th>IP Address</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @forelse($logs as $log)
            <tr>
                <td>{{ $log->id }}</td>
                <td>{{ $log->user->name ?? 'Guest' }}</td>
                <td>
                        <span class="badge
                            @if($log->action == 'login') bg-success
                            @elseif($log->action == 'logout') bg-secondary
                            @elseif($log->action == 'register') bg-primary
                            @elseif($log->action == 'cart_add') bg-warning
                            @elseif($log->action == 'order_created') bg-danger
                            @endif">
                            {{ $log->action }}
                        </span>
                </td>
                <td>{{ $log->message }}</td>
                <td>{{ $log->ip_address }}</td>
                <td>{{ $log->created_at->format('d.m.Y H:i:s') }}</td>
            </tr>
        @empty
            <tr><td colspan="6">No activity logs found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
