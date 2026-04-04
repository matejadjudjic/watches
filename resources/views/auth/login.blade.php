@extends("layouts/app")

@section('content')
    <div class="container mt-5 desno">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Login</h4>

                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="/login">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       placeholder="ime@example.com"
                                       value="{{ old('email') }}"
                                       required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       placeholder="********"
                                       required>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="d-grid gap-2 regse">
                                <button type="submit" class="btn btn-primary btn-lg">Login</button>
                            </div>

                            <div class="mt-3 text-center nesto">
                                <p class="mb-0">Dont have account <a href="/register">Register</a></p>

                            </div>
                        </form>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3 mb-0">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success mt-3 mb-0">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
