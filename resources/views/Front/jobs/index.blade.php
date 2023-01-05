@extends('Front.layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5">
            @foreach ($jops as $jop)
                <div class="col-12 col-md-12 col-xl-6">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="{{ asset('uploads/jops/' . $jop->image) }}" alt="#" />

                            <div class="button">

                                <a href="{{ route('show', $jop->id) }}" class="btn"> تقدم
                                    للوظيفة
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center m-5">
        <div class="col-4 d-flex justify-content-center"> {{ $jops->Links() }} </div>
    </div>
@endsection
