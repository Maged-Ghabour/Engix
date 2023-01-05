@extends('Front.layouts.app')


@section('content')


    <div class="container ">

        <div class="">
            <h2 class="fw-2 text-right">
                قسم ال{{ $category->name }}
            </h2>
        </div>

        <div class="row ">
            @forelse ($category->products as $product)
                @if ($product->category_id == $category->id)
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ asset('uploads/Products/' . $product->image) }}" alt="#" />
                                <div class="button">
                                    <a href="" class="btn"><i class="lni lni-cart"></i> Add to
                                        Cart</a>
                                </div>
                            </div>
                            <div class="product-info text-center">
                                <span class="category">{{ $category->name }}</span>
                                <h4 class="title">
                                    <a href="{{ route('Product.show', $product->id) }}">{{ $product->name }}</a>
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
                                    <span>{{ $product->price . "$" }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @endif
            @empty
                <p class="text-danger">لا يوحد منتجات فى هذا القسم</p>
            @endforelse
        </div>
    </div>
    </div>
    </div>
    <div class="container">
        <hr class="my-5">
    </div>
    <div class="container my-5">
        <div class="row justify-content-center text-center ">
            @forelse ($sub_cats as $cat)
                @if ($cat->parent_id == $category->id)
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-3">
                        <a href="{{ route('sub_cat', [$category->id, $cat->id]) }}" value=""
                            class="btn btn-primary my-2 col-12">{{ $cat->name }}</a>
                    </div>
                @endif
            @empty
                <p class="text-danger">لا يوجد أقسام فرعية للقسم </p>
            @endforelse
        </div>
        <div class="row justifiy-content-center">
            @forelse ($sub_cats as $sub)
                @foreach ($sub->products as $product)
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="{{ asset('uploads/Products/' . $product->image) }}" alt="#" />
                                <div class="button">
                                    <a href="" class="btn"><i class="lni lni-cart"></i> Add to
                                        Cart</a>
                                </div>
                            </div>
                            <div class="product-info text-center">
                                <span class="category">{{ $sub->name }}</span>
                                <h4 class="title">
                                    <a href="{{ route('Product.show', $product->id) }}">{{ $product->name }}</a>
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
                                    <span>{{ $product->price . "$" }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @endforeach
            @empty <p class="text-danger">لا يوحد منتجات فى هذا القسم</p>
            @endforelse
        </div>
    </div>
@endsection
