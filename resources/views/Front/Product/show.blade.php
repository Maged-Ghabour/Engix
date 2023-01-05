@extends('Front.layouts.app')

@section('title', $product->name)

@section('content')
    <div class="container mt-5 pb-3">

        <!--  Add To Cart -->
        @if (session('cart_added'))
            <!-- I'll Make Here Modal --->
        @endif




        <form action="{{ route('cart.store') }}" method="post" class="formAddToCart">
            @csrf
            <div class="row mt-3 mb-3">
                <div class="col-md-12 m-auto m-5 p-5">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-4">
                            <img class="img-fluid image-cover" src="{{ asset('uploads/Products/' . $product->image) }}"
                                alt="{{ $product->name }}" width="300" height="300">
                        </div>
                        <div class="col-md-8">
                            <div class="d-flex justify-content-between">
                                <h3>{{ $product->name }}</h3>
                                <h5 class="text-primary ">
                                    <a href="{{ route('Category.show', $product->category->id) }}">
                                        {{ $product->category->name }} Category</a>
                                </h5>
                            </div>

                            <p class="d-flex justify-content-between text-primary ">{{ $product->price }} £E </p>
                            <div class="col-lg-4 col-md-4 col-12 mt-2">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="form-group quantity product-quantity">
                                    <label for="color">Quantity</label>
                                    <select class="form-control input-group"  name="quantity" id="quantity_wanted"  min="1">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>




                            <div class="add mt-5">
                                <button class="btn btn-primary add-to-cart mx-2" data-toggle="modal"
                                    data-target="#exampleModal" type="submit">
                                    <span class="d-block"> {{__('app.addToCart')}}</span>
                                </button>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <p class="d-flex justify-content-between text-muted">{!! $product->description !!}</p>
            </div>


        </form>

        <!--- End Add To Cart -->

    </div>




@endsection
