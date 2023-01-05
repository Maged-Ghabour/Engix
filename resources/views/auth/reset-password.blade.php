@extends('Front.layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')


    <div class="account-login section">
        {{ session('status') }}
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12 card login-form">
                    <div class="pb-2">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                    <form class="" method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="form-group input-group">
                            <label for="reg-fn">{{ __('Email') }}</label>
                            <input class="form-control" name="email" type="email"
                                value="{{ old('email', $request->email) }}" id="reg-email" required>

                            {{-- <span>{{ $errors->get('email') }}</span> --}}
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group" data-validate="Password is required">
                            <span class="label-input100">{{ __('Password') }}</span>
                            <input id="password" class="input100 form-control w-100" type="password" name="password"
                                placeholder="أدخل الرقم السرى">
                            <span class="focus-input100" id="errpass"></span>
                        </div>

                        <div class="form-group" data-validate="Password is required">
                            <span class="label-input100">تأكيد الرقم السرى</span>
                            <input id="password_confirmation" type="password" class="form-control w-100"
                                name="password_confirmation" autocomplete="new-password" placeholder="أكد الرقم السرى">
                            <span class="focus-input100" id="errcompass"></span>
                        </div>
                        <div class="button w-100">
                            <button class="btn btn-success w-100" type="submit"> {{ __('Reset Password') }}</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
