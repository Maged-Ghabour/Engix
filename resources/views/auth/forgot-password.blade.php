@extends('Front.layouts.app')

@section('title', 'تسجيل الدخول')

@section('content')





    <div class="account-login section">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12 card login-form">

                    <div class="mb-3 text-sm text-gray-600">
                        {{ __('app.Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                    <div class="mb-3">
                        {{ session('status') }}
                    </div>
                    <form class="" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group input-group">
                            <label for="reg-fn">{{ __('app.email') }}</label>
                            <input class="form-control" name="email" type="email" value="{{ old('email') }}"
                                id="reg-email" required>

                            {{-- <span>{{ $errors->get('email') }}</span> --}}
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="button w-100">
                            <button class="btn btn-success w-100"
                                type="submit">{{ __('app.email password reset link') }}</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
