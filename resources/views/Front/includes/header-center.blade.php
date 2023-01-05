<!-- Start Header Middle -->
<div class="header-middle">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-2 col-5">
                <div class="middle-right-area">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="{{ route('Home') }}">

                        <img src="{{ asset('uploads/site-images/logo5.jpg') }}" alt="Logo">
                        {{-- <span class="fw-bold animate__animated animate__bounce animate__delay-2s" style="color:#14db76">
                            @if (app()->getLocale() == 'en')
                            <span class="fw-bold" style="color:#17a7ec">Eng</span>inx</span>
                            @else
                            <span class="fw-bold" style="color:#17a7ec">انچـ</span>نكس</span>
                            @endif --}}
                    </a>

                    <!-- End Header Logo -->
                </div>
            </div>
            <div class="col-lg-5 col-md-7 d-xs-none justify-content-center align-items-center">
                <!-- Start Main Menu Search -->
                <div class="main-menu-search">
                    <!-- navbar search start -->
                    <div class="navbar-search search-style-5">
                        <div class="search-select">
                            <div class="select-position">
                                <select id="select1">
                                    <option selected> {{__('app.all')}}</option>
                                    @foreach ($categories as $category)
                                        <option>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="search-input">
                            <input type="text" placeholder="{{__('app.search')}}">
                        </div>
                        <div class="search-btn">
                            <button><i class="lni lni-search-alt"></i></button>
                        </div>
                    </div>

                    <!-- navbar search Ends -->
                </div>
                <!-- End Main Menu Search -->
            </div>
            <div class="col-lg-4 col-md-3 col-5 d-flex justify-content-between align-items-center">
                <div class="nav-hotline">
                    <i class="lni lni-phone"></i>
                    <h3>{{__('app.customerService')}}:
                        <span>{{__('app.phoneNumber')}}</span>
                    </h3>

                </div>
                <x-cart-menu />
            </div>


        </div>
    </div>
</div>
<!-- End Header Middle -->
