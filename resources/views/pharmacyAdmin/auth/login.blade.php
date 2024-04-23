@extends('layout.mainlayout_admin', ['activePage' => 'login'])
@section('css')
    <style>
        .sm_parent {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 1em;
            margin-bottom: 2em;
        }

        .line_w_text {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .line_w_text h4 {
            font-weight: bold;
            position: relative;
            font-size: 16px;
        }

        .line_w_text::after {
            content: "";
            position: absolute;
            border: none;
            border-top: .2em solid #000;
            left: 0;
            top: 40%;
            width: 37%;
            height: 10px;
        }

        .line_w_text::before {
            content: "";
            position: absolute;
            border: none;
            border-top: .2em solid #000;
            right: 0;
            top: 40%;
            width: 37%;
            height: 10px;
        }


        .social_media_signin {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            margin-top: 1em;
            width: 80% !important;
        }

        .social_media_signin_each {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .googlebtn,
        .facebookbtn {
            background: rgb(230, 103, 103);
            padding: .5em 1em !important;
            color: #fff;
            min-width: 200px;
            min-width: 200px;
            width: 200px;
        }

        .facebookbtn {
            background: rgb(71, 159, 246);
        }

        .googlebtn img,
        .facebookbtn img {
            margin-right: .2em;
            position: relative;
            top: -1px;
        }

        .googlebtn a,
        .facebookbtn a {
            font-weight: bold;
            color: #fff !important;
        }

        @media only screen and (max-width:800px) {
            .line_w_text::after {
                width: 20%;
            }

            .line_w_text::before {
                width: 20%;
            }

            .googlebtn {
                margin-bottom: 1em;
            }

            .social_media_signin {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column !important;
            }

        }
    </style>
@endsection
@section('title', __('Pharmacy login'))

@section('content')
    <section class="section">
        <div class="d-flex flex-wrap align-items-stretch">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                <div class="p-4 m-3">
                    @php
                        $app_logo = App\Models\Setting::first();
                    @endphp
                    @if (!isset($app_logo->logo))
                        <img src="{{ $app_logo->logo }}" alt="logo" width="180" class="mb-5 mt-2">
                    @else
                        <img src="{{ url('/images/upload/logo-docteur24-h40.png') }}" alt="logo" width="180"
                            class="mb-5 mt-2" />
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $item)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $item }}
                            </div>
                        @endforeach
                    @endif
                    <form action="{{ url('verify_pharmacy') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" tabindex="1" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">{{ __('Password') }}</label>
                            </div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2"
                                required>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @if (session('error'))
                            <div class="text-center">
                                <span
                                    class="custom_error  text-red font-fira-sans font-bold text-base mt-1">{{ session('error') }}</span>
                            </div>
                        @endif
                        {{-- <div class="sm_parent">
                            <div class="line_w_text">
                                <h4>{{ __('Or Login Using') }}</h4>
                            </div>
                            <div class="social_media_signin">
                                <div class="social_media_signin_each googlebtn">
                                    <img src="{{ url('images/upload/google.svg') }}" width="15" height="15"
                                        alt="google auth logo docteur" />
                                    <a href="{{ route('google.auth') }}">{{ __('Login with Google') }}</a>
                                </div>
                                <div class="social_media_signin_each facebookbtn">
                                    <img src="{{ url('images/upload/facebook.svg') }}" width="15" height="15"
                                        alt="google auth logo docteur" />
                                    <a href="{{ route('google.auth') }}">{{ __('Login with Facebook') }}</a>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group text-right">
                            <a href="{{ url('pharmacy_forgot_password') }}" class="float-left mt-3">
                                {{ __('Forgot Password?') }}
                            </a>
                            <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="mt-5 text-center">
                            {{ __("Don't have an account?") }} <a
                                href="{{ url('pharmacy_signUp') }}">{{ __('Create new one') }}</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
                data-background="{{ url('assets/img/login.png') }}">
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="mb-2 display-4 font-weight-bold">{{ __('Welcome') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
