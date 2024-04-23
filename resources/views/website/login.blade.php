@extends('layout.mainlayout', ['activePage' => 'login'])
@section('css')
    <style>
        .sm_parent {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 1em;
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
            width: 80%;
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
            width: 220px;
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
                flex-direction: column;
            }

        }
    </style>
@endsection
@section('content')
    <div class="xl:w-3/4 mx-auto">
        <div
            class="flex justify-between items-center pt-20 pb-20 gap-10 lg:flex-row xxsm:flex-col xxsm:mx-5 xl:mx-0 2xl:mx-0">
            <div class="bg-slate-100 justify-center items-center p-10 2xl:w-2/4 xxsm:w-full">
                <h1 class="font-fira-sans leading-10 font-medium text-3xl mb-10">
                    {{ __('Talk to thousands of specialist doctors.') }}</h1>
                <div>
                    <img src="{{ asset('assets/image/login.png') }}" class="w-full h-3/5" alt="">
                </div>
            </div>
            <div class="2xl:w-2/4 xxsm:w-full">
                <h1 class="font-fira-sans leading-10 font-normal text-3xl">{{ __('Welcome Back,') }}</h1>
                <h1 class="font-fira-sans leading-10 font-medium text-3xl">{{ __('Login to get started!') }}</h1>
                <form action="{{ url('patient-login') }}" method="post">
                    @csrf
                    <div class="pt-5">
                        <label for="email"
                            class="font-fira-sans text-black text-sm font-normal">{{ __('Email') }}</label>
                        <input type="text" name="email"
                            class="@error('email') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light"
                            placeholder="{{ __('Enter email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="pt-3">
                        <label for="email"
                            class="font-fira-sans text-black text-sm font-normal">{{ __('Password') }}</label>
                        <input type="password" name="password"
                            class="@error('password') is-invalid @enderror w-full text-sm font-fira-sans text-gray block p-2 z-20 border border-white-light"
                            placeholder="{{ __('Enter password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @if (session('error'))
                        <div class="text-center">
                            <span
                                class="custom_error  text-red font-fira-sans font-normal text-base mt-1">{{ session('error') }}</span>
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
                    <div class="pt-10">
                        <button type="submit"
                            class="font-fira-sans text-white bg-primary w-full text-sm font-normal py-3">{{ __('Login') }}</button>
                    </div>
                    <div class="flex justify-between pt-4">
                        <div class="font-fira-sans font-medium text-sm leading-5 text-primary text-normal">
                            <a href="{{ url('/doctor/doctor_login') }}">{{ __('Doctor Login') }}</a>
                        </div>
                        <div class="font-fira-sans font-medium text-sm leading-5">{{ __('Don’t have an account?  ') }} <a
                                href="{{ url('/signup') }}" class="text-primary text-normal">{{ __('Signup') }}</a>
                        </div>
                        <div class="font-fira-sans font-medium text-sm leading-5 text-primary text-normal">
                            <a href="{{ url('/forgot_password') }}">{{ __('Forgot Password?') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
