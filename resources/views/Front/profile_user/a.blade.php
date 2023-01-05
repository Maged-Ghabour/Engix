{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title> --}}

{{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>  --}}

{{-- <body> --}}
{{-- @dd($user) --}}
@extends('Front.layouts.app')
@section('content')
    <div class="account-login section ">
        <div class="container">
            <div class="row">
                <div class="col-6 ">

                    <div class="row">
                        <div class=" col-12">
                            <div class="register-form">
                                @if (session()->has('error'))
                                    <div class="alert alert-danger mt-2 text-center">
                                        {{ session()->get('error') }}
                                    </div>
                                @endif
                                <div class="col-12 title fw-bold ">
                                    <h3>الصورة الشخصية</h3>
                                </div>
                                <form action="{{ route('profile.updateing', Auth::User()->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-12 pb-2">
                                        <img src="{{ asset('uploads/User/' . Auth::User()->image) }}" width="70px"
                                            height="70px" alt="">
                                    </div>
                                    <div class=" mb-3">
                                        <input type="file" class="form-group" name="image" id="inputGroupFile03"
                                            aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                        <button class="btn btn-outline-success" type="submit">تعديل الصورة</button>
                                    </div>
                                </form>
                                <form class="row" action="{{ route('profile.updateing', Auth::User()->id) }}"
                                    method="POST">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group" data-validate="Name is required">
                                        <span class="label-input100"> إسم المستخدم :</span>
                                        <input id="name" class=" form-control w-100 " type="text" name="name"
                                            value="{{ Auth::User()->name }}">
                                        <span class="" id="errname"></span>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group" data-validate="Email is required">
                                        <span class="label-input100">البريد الإلكترونى :</span>
                                        <input id="email" class="input100 form-control w-100" type="email"
                                            name="email"
                                            placeholder="أدخل البريد الإلكتروني"value="{{ Auth::User()->email }}">
                                        <span class="focus-input100" id="erremail"></span>
                                    </div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group" data-validate="address is required">
                                        <span class="label-input100">عنوانك الحالى :</span>
                                        <input id="address" class="input100 form-control w-100" type="address"
                                            name="address" placeholder="أدخل عنوانك الحالى"
                                            value="{{ Auth::User()->address }}">
                                        <span class="focus-input100" id="erraddress"></span>
                                    </div>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="form-group" data-validate="phone is required">
                                        <span class="label-input100">رقم التليفون المحمول :</span>
                                        <input id="phone" class="input100 form-control w-100" type="phone"
                                            name="phone"
                                            placeholder="أدخل رقم التليفون المحمول"value="{{ Auth::User()->phone }}">
                                        <span class="focus-input100" id="errphone"></span>
                                    </div>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="container-login100-form-btn  d-flex justify-content-between ">
                                        <button type="submit" id='btn' class=" btn btn-success w-100 p-3">
                                            حفظ
                                        </button>
                                    </div>
                                </form>
                                <div class="pt-5">
                                    <form action="{{ route('profile.updateing', Auth::User()->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group" data-validate="Password is required">
                                            <span class="label-input100">الرقم السرى</span>
                                            <input id="password" class="input100 form-control w-100" type="password"
                                                name="password" placeholder="أدخل الرقم السرى">
                                            <span class="focus-input100" id="errpass"></span>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="form-group" data-validate="Password is required">
                                            <span class="label-input100">تأكيد الرقم السرى</span>
                                            <input id="password-confirm" type="password" class="form-control w-100"
                                                name="password_confirmation" autocomplete="new-password"
                                                placeholder="أكد الرقم السرى">
                                            <span class="focus-input100" id="errcompass"></span>
                                        </div>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <div class="container-login100-form-btn  d-flex justify-content-between ">
                                            <button type="submit" id='btn' class=" btn btn-success w-100 p-3">
                                                حفظ
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-6 register-form">
                    <div class="col-12 bg-white ">

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
