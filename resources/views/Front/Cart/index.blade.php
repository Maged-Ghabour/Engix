@include('Front.includes.head')
@include('Front.includes.header-top')
@include('Front.includes.header-center')
@include('Front.includes.header-bottom')
@push('styles')
    @toastr_css
@endpush



    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
        @if(!$cart->get()->isEmpty())
        <div class="cart-list-title">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-12">

                </div>
                <div class="col-lg-4 col-md-3 col-12">
                    <p>{{__('app.productName')}}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p>{{__('app.quantity')}}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p>{{__('app.productPrice')}}</p>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p>{{__('app.subtotal')}}</p>
                </div>

                <div class="col-lg-1 col-md-2 col-12">
                    <p>{{__('app.remove')}}</p>
                </div>
            </div>
        </div>
        @endif
                <!-- End Cart List Title -->
            @forelse ($cart->get() as $item )
            <!-- Cart Single List list -->
            <div class="cart-single-list cart-item" id="{{ $item->id }}">
                <div class="row align-items-center">
                    <div class="col-lg-1 col-md-1 col-12">
                        <a href="product-details.html">
                            <img src="{{ asset('uploads/Products/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <h5 class="product-name"><a href="product-details.html">
                            {{ $item->product->name }}</a></h5>

                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        {{-- <div class="count-input">
                            <select class="form-control item-quantity" id="quantity_wanted" data-id="{{ $item->id }}">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div> --}}

                        <input id="quantity_wanted"
                        class="item-quantity form-control m-0 p-0 pe-3 w-50 text-center"
                        type="number"
                        value="{{ $item->quantity }}"
                        data-id="{{ $item->id }}"
                        name="quantity" min="1"
                        style="display: block;">

                        <form method="post">
                            @csrf
                            <button class="btn btn-primary item-quantity mx-2" data-toggle="modal"
                            data-target="#exampleModal" type="submit">
                            <span class="d-block">تحديث</span>
                        </button>
                        </form>

                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>{{ $item->product->price }}</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>{{ $item->product->price * $item->quantity }}</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <a class="remove-item" data-id="{{ $item->id }}" href=""><i class="fa fa-trash-o"></i></a>
                    </div>
                </div>
            </div>
            <!-- End Single List list -->
            @empty
            <div class="d-flex justify-content-center align-items-center flex-column p-2" >
                <p class="fw-bold p-3" style="font-size: 2em ; color:#17a7ec">{{__('app.cartEmpty')}}</p>
                <img src="{{asset('img/empty-cart.png')}}" alt="" height="150px" width="150px" style="opacity: 50%">
            </div>
            @endforelse





            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon" >
                                        <form action="#" target="_blank">
                                            {{__('app.cartTotal')}}
                                            <div class="badge badge-secondary">
                                                {{ $cart->total() }}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>{{__('app.cartTotal')}} {{ $cart->total() }} </li>
                                        <li>{{__('app.shippingFree')}}</li>
                                        {{-- <li>You Save<span>$29.00</span></li> --}}
                                        <li class="last">{{__('app.youPay')}} {{ $cart->total() }} </li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{route('checkout')}}" class="btn">{{__('app.checkOut')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->

     <script>
        const csrf_token = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/cart.js') }}"></script>

    @push('scripts')
        @toastr_js
        @toastr_render
    @endpush

    @include('Front.includes.footer')
    @include('Front.includes.scripts')




