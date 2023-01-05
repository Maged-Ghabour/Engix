<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>تسجيل دخول الأدمن</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('admin/images/icons/favicon.ico') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/css-hamburgers/hamburgers.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/animsition/css/animsition.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/main.css') }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">

            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url({{ asset('front/images/bg-01.jpg') }})">
                    <span class="login100-form-title-1">
                        تسجيل دخول الأدمن
                    </span>
                </div>
                {{-- Valdation Admin Error --}}
                @if (session()->has('error'))
                    <div class="alert alert-danger mt-2 text-center">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <form class="login100-form validate-form" method="POST" action="{{ route('Admin.confirm') }}">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26" data-validate="البريد الالكترونى مطلوب">
                        <span class="label-input100">البريد الالكترونى</span>
                        <input class="input100" type="email" name="email" placeholder="ادخل البريد الالكترونى">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="الرقم السرى مطلوب">
                        <span class="label-input100">الرقم السرى</span>
                        <input class="input100" type="password" name="password" placeholder="ادخل الرقم السري">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            دخول
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/js/main.js') }}"></script>

</body>

</html>
