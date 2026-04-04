<!DOCTYPE html>
<html>
@include('admin.fixed.head')
<body>
<div class="container-fluid">
    <div class="row">
        @include('admin.fixed.navigation')
        <main class="col-md-10 p-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
@include('admin.fixed.footer')
</body>
</html>
