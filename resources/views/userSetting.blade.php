@extends('layouts.app')
@section('content')

<div class="container my-5 right">
    <div class="row justify-content-center p-5">
        <div class="col-md-8">
            <div class="card">
                <div
                style="background-color: #3CC78F;color: white;" 
                class="card-header">
                {{  app()->getLocale() == 'ar' ? 'الصفحة الشخصية' : 'User Profile' }}
            </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('editUserSetting') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">
                                @lang('auth.Name')   
                            </label>

                            <div class="col-md-6">
                                <input id="name" value="{{$user->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                              
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"> @lang('auth.Email Address')</label>

                            <div class="col-md-6">
                                <input id="email" value="{{$user->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                <input id="email" value="{{$user->email}}" type="text" class="form-control" name="old_email" style="display:none">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"> @lang('auth.mobile')</label>

                            <div class="col-md-6">
                                <input id="mobile" value="{{$user->mobile}}" type="text" class="form-control" name="mobile"  required>

                                <input id="mobile" value="{{$user->mobile}}" type="text" class="form-control" name="old_mobile" style="display:none">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"> @lang('auth.Password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">@lang('auth.Confirm Password') </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{  app()->getLocale() == 'ar' ? 'تعديل' : 'Edit' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection