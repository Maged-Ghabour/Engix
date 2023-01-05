<!DOCTYPE html>
<html class="no-js" lang={{app()->getLocale()}}  {{(app()->getLocale() == 'en' ? "dir='ltr'" : "dir='rtl'")}}>


<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="شركة انيجينيكس ، شركة Enginx Solutions ، Enginx Solutions ، Enginix Solutions , برامج محاسبة ، برامج حسابات ، برامج محاسبية ، تصميم مواقع ، شركة تصميم مواقع ، شركة تصميم مواقع فى مصر ، شركات تصميم مواقع ، افضل شركة تصميم مواقع ، شركة تسويق الكترونى ، أفضل شركة تسويق الكترونى فى مصر ، شركة برمجة ، شركات برمجة ، شركات برامج محاسبة ،  برامج ادارة المحلات التجارية ، برنامج ادارة المدارس ، برنامج ادارة العيادات ، شركة تسويق الكترونى فى مصر ، شركة برمجيات ، تسويق الكترونى ، برمجة ، تطوير مواقع ، شركة الرواد" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <!--- Nice Select --->

    {{-- <link rel="stylesheet" href="path/to/nice-select.css"> --}}


    <!-- ========================= CSS here ========================= -->

    <link rel="stylesheet" href="{{ asset('assets/css/pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>


    <!-- Start Animation on  Scroll -->
    {{-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <!-- End   Animation on  Scroll -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @if (app()->getLocale() == 'en')
        <link href="{{ asset('assets/css/ltr.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
    @endif
    @stack('styles')


    <style>
        tawk-icon-right img{
            display: none !important;
        }

    </style>
</head>
