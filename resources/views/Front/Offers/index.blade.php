@extends('Front.layouts.app')

@section('title', 'All Offers')

@section('content')
    <!-- Start Special Offer -->
    <section class="special-offer section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Special Offer</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($offers as $offer)
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-image">
                                        <a href="{{ route('Offer.show', $offer->id) }}">
                                            <img src="{{ asset('uploads/offers/' . $offer->image) }}" alt="#" />
                                        </a>
                                        <div class="button">
                                            <a href="" class="btn"><i class="lni lni-cart"></i> Add
                                                to
                                                Cart</a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h4 class="title">
                                            <a href="{{ route('Offer.show', $offer->id) }}">{{ $offer->name }}</a>
                                        </h4>
                                        <ul class="review">
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><span>5.0 Review(s)</span></li>
                                        </ul>
                                        <div class="price">
                                            <span> {!! $offer->description !!}</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="offer-content">
                            <div class="image">
                                <img src="{{ asset('uploads/offers/' . $offer->image) }}" alt="#" />
                                <span class="sale-tag">-50%</span>
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="product-grids.html">{{ $offer->name }}</a>
                                </h2>
                                <ul class="review">
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><i class="lni lni-star-filled"></i></li>
                                    <li><span>5.0 Review(s)</span></li>
                                </ul>
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
                                    <h2 id="daystxt">Days</h2>
                                </div>
                                <div class="box">
                                    <h1 id="hours">00</h1>
                                    <h2 id="hourstxt">Hours</h2>
                                </div>
                                <div class="box">
                                    <h1 id="minutes">00</h1>
                                    <h2 id="minutestxt">Minutes</h2>
                                </div>
                                <div class="box">
                                    <h1 id="seconds">00</h1>
                                    <h2 id="secondstxt">Secondes</h2>
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
                @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            {{ $offers->links() }}
        </div>
    </section>
    <!-- End Special Offer -->

@endsection
