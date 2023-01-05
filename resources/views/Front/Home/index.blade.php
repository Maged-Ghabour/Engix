@extends('Front.layouts.app')

@section('title', 'Home')

@section('content')
 {{-- <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style='background-image: url("{{ asset('uploads/SHOP/Component 1.png') }}");'>
                                <div class="content">
                                </div>
                            </div>
                            <!-- End Single Slider -->
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style='

                               background-image: url("{{ asset('uploads/SHOP/Component 1.png') }}");'>

                                <div class="content">
                                    <h2>
                                        <span>Big Sale Offer</span>
                                        Get the Best Deal on CCTV Camera
                                    </h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur
                                        elit, sed do eiusmod tempor incididunt ut
                                        labore dolore magna aliqua.
                                    </p>
                                    <h3><span>Combo Only:</span> $590.00</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div>

                            </div>
                            <!-- End Single Slider -->
                            <div class="single-slider"
                                style='
                                background-image: url("{{ asset('uploads/Products/3.png') }}"); '>
                            </div>
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area --> --}}


<!-- Start Slider -->

 <!-- Start Hero Area -->
  {{-- <section class="hero-area">
    <div class="container-fluid">
        <div class="row">

                <div class="col-lg-6 col-12 p-0">
                        <div class="content-text">
                            <p>شركة Engix Solutions متتخصصون في  <span class="animateHead"></span> </p>
                            <span class="body-head">نقدم دائما الحل الأمثل من أجلك</span>
                            <span class="footer-head">انجينكيس هي شركة رائدة في مجال المعلومات وتكنولوجيا المعلومات</span>
                        </div>
                </div>
                <div class="col-lg-6 col-12 p-0">
                        <div class="content-image">

                        </div>
                </div>
        </div>
</div>
</section> --}}
<!-- End Hero Area -->



<!-- Start Hero Area -->
 <section class="hero-area">
    <div class="container-fluid">
        <div class="row">


                <div id="particles-js">
                        <div class="content">
                            <h1>شركة <span class="company-name">إنچـيكس
                                سوليوشنز</span></h1>
                            <h3>نحن مؤهلون لإنجاز أكبر المشاريع التي تخدم </h3>
                            <span class="animateHead"></span>
                        </div>
                </div>
        </div>
</div>
</section>
<!-- End Hero Area -->












<!--- End Slider --->


    <!-- Start Featured Categories Area -->
    <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title animate__animated animate__backInUp animate__delay-1s">

                        <h2 class="main-title">{{__('app.featuredCategories')}}</h2>



                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($categories as $category)

                     <div class="col-lg-4 col-md-8 col-12 mb-3" data-tilt data-tilt-glare  >
                        <!-- Start Single Category -->
                        <div class="single-product" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
                            <div class="product-image">
                                <img src="{{ asset('uploads/Categories/' . $category->image) }}" alt="{{ $category->name }}" />
                            </div>
                            <div class="product-info">
                                <h3 class="title">
                                    <a href="{{ route('Category.show', $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </h3>
                                <ul class="category">
                                    @forelse ($category->children as $sub_cat)
                                        <li>
                                            <a
                                                href="{{ route('Sub_Category.Show', [$category->id, $sub_cat->id]) }}">{{ $sub_cat->name }}</a>
                                        </li>
                                    @empty
                                        <p class="text-center">
                                            -
                                        </p>
                                    @endforelse
                                </ul>
                            </div>

                        </div>
                        <!-- End Single Product -->
                    </div>
                @empty


                       <div class="d-flex justify-content-center align-items-center">
                             <img class="img-fluid" src="{{asset('img/no-comment.png')}}" width="150px" height="150px" alt="no category" style="opacity:50%">
                       </div>

                    <p class="text-center text-primary fw-bold">{{__('app.noCat')}}</p>

                @endforelse
            </div>
        </div>

    </section>
    <!-- End Features Area -->

    <!-- Start Trending Product Area -->
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title animate__animated animate__backInUp animate__delay-2s">

                        <h2 class="main-title">{{__('app.trendingProduct')}}</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-lg-3 col-md-6 col-12 mb-3" data-tilt data-tilt-glare >
                        <!-- Start Single Product -->
                        <div class="single-product h-100"  data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
                            <div class="product-image">

                                <img src="{{ asset('uploads/Products/' . $product->image) }}" alt="{{ $product->name }}" height="237px"/>

                                <div class="button">
                                    <a href="{{ route('Product.show', $product->id) }}" class="btn"><i
                                            class="lni lni-cart"></i>
                                        {{ __('app.addToCart') }}</a>

                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">
                                    <a href="{{ $product->category->id }}">
                                        {{ $product->category->name }}
                                    </a>
                                </span>
                                <h4 class="title">
                                    <a href="{{ route('Product.show', $product->id) }}">{{ $product->name }}</a>
                                </h4>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star"></i></li>
                                    <li><span>4.0 Review(s)</span></li>
                                </ul>
                                <div class="price">
                                    <span>$ {{ $product->price }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @empty

                <div class="d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="{{asset('img/no-comment.png')}}" width="150px" height="150px" alt="no category" style="opacity:50%">
              </div>

                 <p class="text-center text-primary fw-bold">{{__('app.noProduct')}}</p>

                @endforelse
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->











        <!-- Start Customers -->
    <section class="clients m-5" style="position: relative">
        <div class="dots dots-up"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-title animate__animated animate__flipInX animate__delay-2s">

                        <h2 class="main-title">{{__('app.ourCustomers')}}</h2>

                    </div>
                </div>
            </div>
            <div class="row">

                   <div class="col-md-12 p-5">
                    <div class="owl-carousel owl-theme clients-carousel d-flex justify-content-center align-items-center">
                        @forelse ($customers as $customer)
                        <div class="item box p-5">
                                <div class="img" style=" height: 185px ; width :185px; border-radius:50%" >
                                    <img src="{{asset('uploads/Customers/'.$customer->image)}}" alt="" class="animate__animated animate__flipInX animate__delay-2s clinet-img border-circle text-center" style=" height: 185px ; width :185px; border-radius:50% " >
                                </div>
                                <p class="text-center">{{$customer->title}}</p>
                        </div>
                        @empty
                    </div>
                   </div>


                <div class="d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="{{asset('img/no-comment.png')}}" width="150px" height="150px" alt="no category" style="opacity:50%">
              </div>

                 <p class="text-center text-primary fw-bold">{{__('app.noProduct')}}</p>

                @endforelse
            </div>
        </div>
    </section>
    <!-- End Customers -->

<!-- Start Slider -->

 <!-- Start Hero Area -->
  <section class="hero-area">
    <div class="container-fluid">
        <div class="row">
                <div class="col-lg-6 col-12 p-0">
                        <div class="content-text">
                            <p>شركة Engix Solutions متتخصصون في  <span class="animateHead"></span> </p>
                            <span class="body-head">نقدم دائما الحل الأمثل من أجلك</span>
                            <span class="footer-head">انجينكيس هي شركة رائدة في مجال المعلومات وتكنولوجيا المعلومات</span>
                        </div>
                </div>
                <div class="col-lg-6 col-12 p-0">
                        <div class="content-image">

                        </div>
                </div>
        </div>
</div>
</section>
<!-- End Hero Area -->















    <!-- Start Special Offer -->
    <section class="special-offer section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title animate__animated animate__bounce animate__backInUp animate__delay-2s">


                        <h2 class="main-title">{{__('app.specialOffer')}}</h2>


                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($offers as $offer)
                    <div class="col-lg-8 col-md-12 col-12" data-aos="fade-up-right" data-aos-duration="2000">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12" >
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <img src="{{ asset('uploads/offers/' . $offer->image) }}" alt="#" />
                                        <div class="button">
                                            <a href="" class="btn"><i class="lni lni-cart"></i>
                                                {{ __('app.addToCart') }}</a>


                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h4 class="title">
                                            <a href="{{ route('Offer.show', $offer->id) }}">{{ $offer->name }}</a>
                                        </h4>
                                        {{-- <ul class="review">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><span>5.0 Review(s)</span></li>
                                        </ul> --}}
                                        <div class="price">
                                            <span> {!! $offer->description !!}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12" data-aos="fade-up-left" data-aos-duration="2000">
                        <div class="offer-content">
                            <div class="image">
                                <img src="{{ asset('uploads/offers/' . $offer->image) }}" alt="#" />
                                <span class="sale-tag">-50%</span>
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="product-grids.html">{{ $offer->name }}</a>
                                </h2>
                                {{-- <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><span>5.0 Review(s)</span></li>
                                </ul> --}}
                                <div class="price">
                                    <span>$200.00</span>
                                    <span class="discount-price">$400.00</span>
                                </div>
                                <p>
                                    {!! $offer->description !!}
                                </p>
                            </div>
                            <div class="box-head">
                                <div class="box">
                                    <h1 id="days">000</h1>
                                    <h2 id="daystxt">{{__('app.days')}}</h2>
                                </div>
                                <div class="box">
                                    <h1 id="hours">00</h1>
                                    <h2 id="hourstxt">{{__('app.hours')}}</h2>
                                </div>
                                <div class="box">
                                    <h1 id="minutes">00</h1>
                                    <h2 id="minutestxt">{{__('app.minutes')}}</h2>
                                </div>
                                <div class="box">
                                    <h1 id="seconds">00</h1>
                                    <h2 id="secondstxt">{{__('app.secondes')}}</h2>
                                </div>
                            </div>
                            <div style="background: rgb(204, 24, 24)" class="alert">
                                <h1 style="padding: 50px 80px; color: white">
                                    We are sorry, Event ended !
                                </h1>
                            </div>
                        </div>
                    </div>
                @empty

                <div class="d-flex justify-content-center align-items-center">
                    <img class="img-fluid" src="{{asset('img/no-comment.png')}}" width="150px" height="150px" alt="no category" style="opacity:50%">
              </div>

                 <p class="text-center text-primary fw-bold">{{__('app.noOffer')}}</p>

                @endforelse
            </div>
        </div>
    </section>
    <!-- End Special Offer -->

    <!-- Start Shipping Info -->
    <section class="shipping-info" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="2000">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>{{__('app.yearsOfExp')}}</h5>
                        <span>3</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>{{__('app.siteNumber')}}</h5>
                        <span>300</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>{{__('app.ourPrograms')}}</h5>
                        <span>20</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>{{__('app.ourServices')}}</h5>
                        <span>2</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                <div class="media-icon">
                    <i class="lni lni-reload"></i>
                </div>
                <div class="media-body">
                    <h5>{{__('app.ourCustomers')}}</h5>
                    <span>2</span>
                </div>
            </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->



@endsection









@push("scripts")
<script>
    $(".clients-carousel").owlCarousel({
    autoplay:true ,
    loop :true ,
    margin :15 ,
    dots :false ,
    slideTransition : "linear" ,
    autoplayTimeout : 4500,
    autoplayHoverPause : true ,
    autoplaySpeed : 4500 ,
    responsive : {
        0 : {
            items :1
        },
        500 : {
            items :1
        },
        600 : {
            items :3
        },
        800 : {
            items :5
        },
        1200 : {
            items :6
        },

    }
})
</script>
@endpush
