@extends('layouts.app')

@section('content')
<div class="container my-5 right">
   
    <div class="row justify-content-center p-5">
        <div class="col-md-8">
            <div class="card">
                <div style="background-color: #3CC78F;color: white;" class="card-header">
                    {{ app()->getLocale() == 'ar' ? 'تسجيل الدخول' : 'Login' }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"> @lang('auth.Email Address')</label>

                            <div class="col-md-6">
                                <input id="email" placeholder="@lang('auth.Email Address')" type="email"
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
                            <label for="password" class="col-md-4 col-form-label text-md-end"> @lang('auth.Password')</label>

                            <div class="col-md-6">
                                <input id="password" placeholder="@lang('auth.Password')" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6 my-3">
                                    <a href="{{ route('register') }}" style="text-decoration: underline;"> @lang('auth.dont have account') </a>
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row mb-0">

                          
                            <button type="submit" class="btn btn-success">
                                {{ app()->getLocale() == 'ar' ? 'تسجيل الدخول' : 'Login' }}
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection