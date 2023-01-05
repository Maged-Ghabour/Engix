@extends('Front.layouts.app')

@section('title', 'عمل حساب جديد')


@section('content')

    <div class="account-login section ">
        <div class="container ">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">

                    <div class="register-form">
                        <div class="title text-center">
                            <h3> {{__('app.DontHaveAccount')}} {{__('app.registerNow')}}</h3>
                        </div>
                        @if (session()->has('error'))
                            <div class="alert alert-danger mt-2 text-center">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <form class="row" action="{{ route('register.store') }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            <div class="form-group" data-validate="Name is required">

                                <span class="label-input100"> {{__('app.yourName')}} :</span>
                                <input id="name" class=" form-control w-100" type="text" name="name"
                                    placeholder="{{__('app.enterName')}}" onkeyup="validname();">


                                <span class="" id="errname"></span>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group" data-validate="Email is required">
                                <span class="label-input100"> {{__('app.email')}} :</span>
                                <input id="email" class="input100 form-control w-100" type="email" name="email"

                                    placeholder="{{__('app.enterEmail')}}" onkeyup="validemail();">

                                <span class="focus-input100" id="erremail"></span>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>                            @enderror
                            <div class="form-group" data-validate="address is required">
                                <span class="label-input100"> {{__('app.yourAddress')}} :</span>
                                <input id="address" class="input100 form-control w-100" type="address" name="address"

                                    placeholder="{{__('app.enterAddress')}}" onkeyup="validaddress();">

                                <span class="focus-input100" id="erraddress"></span>
                            </div>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-group" data-validate="phone is required">
                                <span class="label-input100">{{__('app.yourPhone')}}</span>
                                <input id="phone" class="input100 form-control w-100" type="phone" name="phone"

                                    placeholder="{{__('app.enterPhone')}}" onkeyup="validphone();">

                                <span class="focus-input100" id="errphone"></span>
                            </div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-group bg-white" data-validate="image is required">

                                <span class="label-input100">{{__('app.personalImage')}}</span>
                                <input id="image" class="form-control custom-file" type="file" name="image"  onchange="validimage();">

                                <span class="focus-input100" id="errimage"></span>
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-group" data-validate="Password is required">
                                <span class="label-input100">{{__('app.password')}}</span>
                                <input id="password" class="input100 form-control w-100" type="password" name="password"

                                    placeholder="{{__('app.enterPassword')}}" onkeyup="validpassword();">

                                <span class="focus-input100" id="errpass"></span>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-group" data-validate="Password is required">
                                <span class="label-input100"> {{__('app.confirmPass')}} </span>
                                <input id="password-confirm" type="password" class="form-control w-100"

                                    name="password_confirmation" autocomplete="new-password" placeholder="{{__('app.password')}}" onkeyup="validpasswordconfirm();">

                                <span class="focus-input100" id="errcompass"></span>
                            </div>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="container-login100-form-btn  d-flex justify-content-between ">
                                <button type="submit" id='btn' class=" btn btn-success w-100 p-3">
                                    {{__('app.register')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validname() {
            var name = document.getElementById('name').value;
            var element = document.getElementById("errname");
            if (name.length == 0) {
                element.innerHTML = "Please Enter Your Full Name";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            // if (!name.match(/[a-z]/)) {
            //     element.innerHTML = "Please Enter Your Name";
            //     element.classList.add("d-block");
            //     element.classList.add("text-danger");
            //     return false;
            // }
            if (!name.match(/^[\u0621-\u064A\u0660-\u0669 ]+$/)) {
                element.innerHTML = "Please Enter Your Name";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            element.classList.remove("text-danger");
            element.classList.add("text-success");
            element.innerHTML = "Your Name is success";
            element.classList.add("d-block");
            return true;
        }

        function validemail() {
            var email = document.getElementById('email').value;
            var element = document.getElementById("erremail");
            if (email.length == 0) {
                element.innerHTML = "Example123@Example.Example";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            if ((!email.match(/^[\w-\.]+@([\w - ]+\.)+[\w - ]{2,4}$/))) {
                element.innerHTML = "Please Enter Your Email";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            element.classList.remove("text-danger");
            element.classList.add("text-success");
            element.innerHTML = "Your Email is success";
            element.classList.add("d-block");
            return true;
        }

        function validaddress() {
            var address = document.getElementById('address').value;
            var element = document.getElementById("erraddress");
            if (address.length == 0) {
                element.innerHTML = "Please Enter Your Address";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            if ((!address.match(/^[\u0621-\u064A\u0660-\u0669 ]+$/))) {
                element.innerHTML = "Please Enter Your Address";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            element.classList.remove("text-danger");
            element.classList.add("text-success");
            element.innerHTML = "Your Address is success";
            element.classList.add("d-block");
            return true;
        }

        function validphone() {
            var phone = document.getElementById('phone').value;
            var element = document.getElementById("errphone");
            if (phone.length == 0) {
                element.innerHTML = "your phone must be started 01(0125)";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            if (phone.length !== 11) {
                element.innerHTML = "your phone must be Contain at lest 11 digits";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            if ((!phone.match(/^01[0125][0-9]{8}$/))) {
                element.innerHTML = "your phone must be started 01(0125)";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            element.classList.remove("text-danger");
            element.classList.add("text-success");
            element.innerHTML = "Your Phone is success";
            element.classList.add("d-block");
            return true;
        }

        function validimage() {
            var image = document.getElementById('image').value;
            var element = document.getElementById("errimage");
            if ((!image.match(/[\/.](gif|jpg|jpeg|tiff|png)$/i))) {
                element.innerHTML = "your image must be contain .gif|jpg|jpeg|tiff|png";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            element.classList.remove("text-danger");
            element.classList.add("text-success");
            element.innerHTML = "Your Image is Valid";
            element.classList.add("d-block");
            return true;
        }

        function validpassword() {
            var password = document.getElementById('password').value;
            var element = document.getElementById("errpass");
            if (password.length < 8) {
                element.innerHTML = "your Password must be contain at Lest 8 Letters";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            if ((!password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/))) {
                element.innerHTML = "your Password must be contain capital and small and numeric letters";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            element.classList.remove("text-danger");
            element.classList.add("text-success");
            element.innerHTML = "Your password is Valid";
            element.classList.add("d-block");
            return true;
        }

        function validpasswordconfirm() {
            var password_confirm = document.getElementById('password-confirm').value;
            var password = document.getElementById('password').value;
            var element = document.getElementById("errcompass");
            if (password_confirm !== password) {
                element.innerHTML = "your Password must be equel password confirm";
                element.classList.add("d-block");
                element.classList.add("text-danger");
                return false;
            }
            element.classList.remove("text-danger");
            element.classList.add("text-success");
            element.innerHTML = "Your password confirm is Valid";
            element.classList.add("d-block");
            return true;
        }

    </script>

@endsection
