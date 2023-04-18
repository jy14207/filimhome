@extends('layouts.app')

@section('page_title','فیلم نت - ورود به مدیریت')
@section('content')
    <div class="container">
        <x-success></x-success>
        <x-errors></x-errors>
        <div class="row" style="padding-top: 7rem;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text ">{{ __('ورود') }}</div>
                    <div class="card-body">
                        <form id="login" method="POST" action="{{ route('login') }}">
                            @csrf
                            {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
                            <div class="form-group row" style="margin-bottom: 1rem">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right text">{{ __('نام کاربری : ') }}</label>
                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control @error('email') is-invalid @enderror" name="username"
                                           value="{{ old('username') }}" required autocomplete="username" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right text">{{ __('گذرواژه : ') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" id="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--<div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label text" for="remember" style="padding-right: 0rem">
                                            {{('مرا به خاطر بسپار') }}
                                        </label>
                                    </div>
                                </div>
                            </div>--}}
                            <script>
                                document.getElementById('password')
                                    .addEventListener('keyup', function (event) {
                                        if (event.code === 'Enter') {
                                            event.preventDefault();
                                            document.querySelector('form').submit();
                                        }
                                    });
                                document.getElementById('username')
                                    .addEventListener('keyup', function (event) {
                                        if (event.code === 'Enter') {
                                            event.preventDefault();
                                            document.querySelector('form').submit();
                                        }
                                    });

                            </script>

                            <div class="form-group row mb-0 " >
                                <div class="col-md-12" style="text-align: left">
                                    <button type="submit" class="btn btn-primary float-left hand-pointer">
                                        <i class="fa fa-edit"></i>

                                        {{ __('ورود') }}
                                    </button>
                                    {{--@if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif--}}
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    html, body {
        background-image: url("/images/Login_Background.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;
    }

    .card {
        margin-top: auto;
        margin-bottom: auto;
        background-color: rgba(0, 0, 0, 0.5) !important;
    }

    .text {
        color: white;
    }

</style>
