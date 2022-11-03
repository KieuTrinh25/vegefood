@extends('layouts.app')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('./css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
@endsection

@section('title', __("web.login_title"))
@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
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
                        <h5 class="card-title text-center mb-5 fw-light fs-5" style="color: #82AE46">{{ __('Login') }}</h5>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

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

                            <!-- 2 column grid layout for inline styling -->
                            <div class="row mb-4">
                                <div class="col d-flex justify-content-center">
                                    <!-- Checkbox -->
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }} />
                                        <label class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
                                    </div>
                                </div>

                                <div class="col d-flex justify-content-center">
                                    <!-- Simple link -->
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" style="color: #82AE46">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" style="background-color: #82AE46; border-color:#82AE46"
                                    type="submit">{{ __('Login') }}</button>
                            </div>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <p>Not a member? <a href="{{ route('register') }}" style="color: #82AE46">Register</a></p>
                                <p>or sign up with:</p>
                                <a href=""  type="submit" class="btn btn-link btn-floating mx-1">
                                  <i class="fab fa-facebook-f" style="color: #82AE46"></i>
                                </a>
                            
                                <a href="{{ route('login.google') }}" type="submit" class="btn btn-link btn-floating mx-1">
                                  <i class="fab fa-google" style="color: #82AE46"></i>
                                </a>
                            
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                  <i class="fab fa-twitter" style="color: #82AE46"></i>
                                </button>
                            
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                  <i class="fab fa-github" style="color: #82AE46"></i>
                                </button>
                              </div>

                            {{-- <hr class="my-4"> --}}
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
