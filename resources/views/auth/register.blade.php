@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('./css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
@endsection

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">{{ __('Register') }}</h5>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input id="floatingInputUsername" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="myusername" value="{{ old('name') }}" required autocomplete="name"
                                    autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="floatingInputUsername">{{ __('Username') }}</label>
                            </div>


                            <div class="form-floating mb-3">
                                <input id="floatingInputEmail" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="name@example.com" value="{{ old('email') }}" required
                                    autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="floatingInputEmail">{{ __('Email Address') }}</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input id="floatingPassword" type="password"
                                    class="form-control  @error('password') is-invalid @enderror" name="password"
                                    placeholder="Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="floatingPassword">{{ __('Password') }}</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input id="floatingPasswordConfirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Password">
                                <label for="floatingPasswordConfirm">{{ __('Confirm Password') }}</label>
                            </div>

                            <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase"
                                    type="submit">{{ __('Register') }}</button>
                            </div>
                            @if (Route::has('login'))
                                <a class="d-block text-center mt-2 small" href="{{ route('login') }}">
                                    Have an account? Sign In</a>
                            @endif

                            {{-- <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-google btn-login fw-bold text-uppercase" type="submit">
                                    <i class="fab fa-google me-2"></i> Sign up with Google
                                </button>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-lg btn-facebook btn-login fw-bold text-uppercase" type="submit">
                                    <i class="fab fa-facebook-f me-2"></i> Sign up with Facebook
                                </button>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
