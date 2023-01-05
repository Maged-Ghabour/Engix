@extends('Front.layouts.app')

@section('title')
    {{__('app.login')}}
@endsection
@section('content')




    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    @if (session()->has('error'))
                        <div class="alert alert-danger mt-2 text-center">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <form class="card login-form" method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="card-body">
                            <div class="title">
                                <h3 class="text-center">{{__('app.loginNow')}}</h3>
                            </div>
                            <div class="form-group input-group" data-validate="Email is required">
                                <span class="reg-fn">{{__('app.email')}}</span>
                                <input class="form-control" type="email" name="email"
                                    placeholder= "{{__('app.enterEmail')}}">
                                <span class="focus-input100" id="erremail"></span>
                            </div>
                            <div class="form-group input-group" data-validate="Password is required">
                                <span class="reg-fn">{{__('app.password')}}</span>
                                <input class="form-control" type="password" name="password" placeholder="{{__('app.password')}}"
                                    required>
                                <span class="focus-input100" id="errpass"></span>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between bottom-content">
                                <div class="form-check">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="form-check-input width-auto"
                                            name="remember">
                                        <label class="form-check-label">{{__('app.rememberMe')}}</label>
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="lost-pass" href="{{ route('password.request') }}">
                                        {{__('app.forgetPass')}}
                                    </a>
                                @endif
                            </div>
                            <div class="w-100">
                                <button class="btn btn-success w-100 p-2" id="btn" type="submit">{{__('app.login')}}</button>
                            </div>
                            @if (Route::has('password.request'))
                                <p class="outer-link">{{__('app.DontHaveAccount')}} <a href="{{ route('register') }}"> {{__('app.registerNow')}}</a>
                                </p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
