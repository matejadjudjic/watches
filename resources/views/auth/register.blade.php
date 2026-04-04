@extends("layouts/app")

@section('content')
    <div class="container mt-5 desno">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Registration</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/register">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       id="name"
                                       name="name"
                                       placeholder="Unesite vaše ime"
                                       value="{{ old('name') }}"
                                       required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email </label>
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

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password"
                                       class="form-control"
                                       id="password_confirmation"
                                       name="password_confirmation"
                                       placeholder="********"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text"
                                       class="form-control @error('phone') is-invalid @enderror"
                                       id="phone"
                                       name="phone"
                                       placeholder="+381 60 123 4567"
                                       value="{{ old('phone') }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text"
                                       class="form-control @error('address') is-invalid @enderror"
                                       id="address"
                                       name="address"
                                       placeholder="Ulica i broj"
                                       value="{{ old('address') }}">
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text"
                                           class="form-control @error('city') is-invalid @enderror"
                                           id="city"
                                           name="city"
                                           placeholder="Beograd"
                                           value="{{ old('city') }}">
                                    @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text"
                                           class="form-control @error('country') is-invalid @enderror"
                                           id="country"
                                           name="country"
                                           placeholder="Serbia"
                                           value="{{ old('country') }}">
                                    @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-grid gap-2 regse">
                                <button type="submit" class="btn btn-primary btn-lg">Register</button>
                            </div>

                            <div class="mt-3 text-center nesto">
                                <p>
                                    Already have an account? <a href="/login">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
