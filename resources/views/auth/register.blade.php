@extends('layouts.auth')

@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-6">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Welcome</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}" role="form">
                                        @csrf
                                        <label>{{ __('Name') }}</label>
                                        <div class="mb-3">
                                            <input id="name" name="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                                value="{{ old('name') }}" aria-label="name" required autocomplete="name"
                                                autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <label>{{ __('Email Address') }}</label>
                                        <div class="mb-3">
                                            <input id="email" name="email" type="text"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="email" value="{{ old('email') }}" aria-label="email" required
                                                autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <label>{{ __('Password') }}</label>
                                        <div class="mb-3">
                                            <input id="password" name="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" aria-label="Password"
                                                aria-describedby="password-addon" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <div class="mb-3">
                                            <input id="password-confirm" name="password_confirmation" type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                placeholder="password_confirmation" aria-label="Password" required
                                                autocomplete="new-password">
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn bg-gradient-info w-100 mt-4 mb-0">{{ __('Register') }}</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        You have an account?
                                        <a href="{{ route('login') }}"
                                            class="text-info text-gradient font-weight-bold">Sign
                                            in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                    style="background-image:url('{{ asset('assets/img/curved-images/curved6.jpg') }}')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
