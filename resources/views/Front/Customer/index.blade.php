@extends('Front.layouts.app')


@section('title', 'Our Customers')

@section('content')

    {{-- Start Showing customers  --}}
    <div class="clients">
    <div class="dots dots-up"></div>
    <div class="dots dots-down"></div>
    <div class="container mt-3 pb-4">



        <div class="section-title animate__animated animate__backInUp animate__delay-1s" style="margin: 2em 0 4em " >
            <h2 class="main-title">{{__("app.clients")}}</h2>
        </div>


        <div class="row">

            @forelse ($customers as $customer)



                    <figure class="snip1242">
                        <img src="{{ asset('uploads/Customers/' . $customer->image) }}" class="w-100" />                        <figcaption>
                        <figcaption class="text-white">
                            <i class="ion-paper-airplane"></i>
                        <h4>Chauffina</h4>
                        <h2>Carr</h2>
                        </figcaption>
                        <a href="#"></a>
                    </figure>

                {{-- <div class="col-lg-3 course_box mb-4">

                    <div class="client-card card h-100">
                        <!-- Start Single Customer -->



                        <div class="card-client-body card-body text-center">

                            <div class="bg-image hover-overlay hover-zoom hover-shadow ripple">
                                <img src="{{ asset('uploads/Customers/' . $customer->image) }}" class="w-100" />

                                <div class="mask" style="background-color: rgba(57, 192, 237, 0.2)"></div>

                            </div>
                            <div class="client-opacity"></div>
                            <div class="client-content">
                                <div class="product-info">
                                    <h4 class="title"> {{ $customer->title }}</h4>
{{--
                                    <div class="description">
                                        <span> {!! $customer->description !!}</span>
                                    </div> --}}
                                {{-- </div>
                            </div>
                        </div>
                        <!-- End Single Customer -->
                    </div>


                </div>  --}}
            @empty
                <p class="text-danger">NO Avilable customers </p>
            @endforelse
        </div>
    </div>

    </div>



    <div class="d-flex justify-content-center align-items-center w-100 p-5">
        {{ $customers->links() }}
    </div>
    {{-- End Showing customers --}}

@push("scripts")
<script>
        /* Demo purposes only */
    $(".hover").mouseleave(
    function () {
        $(this).removeClass("hover");
    }
    );
</script>
@endpush
@endsection
