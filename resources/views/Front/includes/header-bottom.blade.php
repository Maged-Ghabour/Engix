

<!-- Start Header Bottom -->
<div class="container">



    <div class="row align-items-center">
        <div class="col-lg-10 col-md-6 col-12">
            <div class="nav-inner">
                <!-- Start Mega Category Menu -->
                <div class="mega-category-menu">
                    <span class="cat-button"><i class="lni lni-menu"></i><a href="{{ route('Category.index') }}">
                            {{__('app.allCategories')}}
                            </a></span>
                    <ul class="sub-category">
                        @foreach ($categories as $category)
                            <li>
                                <a href="{{ route('Category.show', $category->id) }}">{{ $category->name }}
                                    @if ($category->children->count() > 0)
                                        <i class="lni lni-chevron-right"></i>
                                    @endif
                                </a>
                                @foreach ($category->children as $sub_cat)
                                    <ul class="inner-sub-category">
                                        <li><a
                                                href="{{ route('Sub_Category.Show', [$category->id, $sub_cat->id]) }}">{{ $sub_cat->name }}</a>
                                        </li>
                                    </ul>
                                @endforeach
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- End Mega Category Menu -->
                <!-- Start Navbar -->
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul id="nav" class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="{{ route('Home') }}" class="active" aria-label="Toggle navigation">{{__('app.home')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="dd-menu collapsed {{Route::currentRouteName() == (route('Category.index', $category->id)) ? 'active' : ''}}" href="{{ route('Category.index') }}"
                                    data-bs-toggle="collapse" data-bs-target="#submenu-1-2"
                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                    aria-label="Toggle navigation">{{__('app.categories')}}</a>
                                <ul class="sub-menu collapse" id="submenu-1-2">
                                    @foreach ($categories as $category)
                                        <li class="nav-item">
                                            <a class="{{ Route::currentRouteName() == route('Category.show', $category->id) ? 'active' : ''}}"
                                                    href="{{ route('Category.index', $category->id) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="nav-item">

                                <a class="dd-menu collapsed" href="{{ route('Product.index') }}"
                                    data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                    aria-controls="navbarSupportedContent" aria-expanded="false"
                                    aria-label="Toggle navigation" >{{__('app.store')}} </a>
                                <ul class="sub-menu collapse" id="submenu-1-3">
                                    <li class="nav-item"><a href="{{ route('Product.index') }}">{{__('app.searchProducts')}}</a></li>
                                    <li class="nav-item"><a href="{{ route('cart.index') }}">{{__('app.cart')}}</a></li>
                                    <li class="nav-item"><a href="{{ route('checkout') }}">{{__('app.checkOut')}}</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('Offer.index') }}" aria-label="Toggle navigation"  class="{{ Route::currentRouteName() == 'Offer.index' ? 'active' : ''}}" >{{__('app.offers')}}</a>

                            </li>
                            <li class="nav-item">
                                <a href="{{ route('MyJops') }}" aria-label="Toggle navigation"  class="{{ Route::currentRouteName() == 'MyJops' ? 'active' : ''}}">{{__('app.jobs')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('customer.index') }}" aria-label="Toggle navigation" class="{{ Route::currentRouteName() == 'customer.index' ? 'active' : ''}}"> {{__('app.clients')}}</a>
                            </li>
                        </ul>
                    </div> <!-- navbar collapse -->
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
        <div class="col-lg-2 col-md-6 col-12">
            <!-- Start Nav Social -->
            <div class="nav-social d-flex justify-content-center align-items-center">
                <h5 class="title m-0">{{__('app.followUs')}}:</h5>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/engix3" target="_blank"><i
                                class="lni lni-facebook-filled"></i></a>
                    </li>
                </ul>
            </div>
            <!-- End Nav Social -->
        </div>
    </div>
</div>
<!-- End Header Bottom -->
</header>
<!-- End Header Area -->


<!--- Start whatsapp -->

<div class="whatsapp-icon">
    <span>تواصل مع خدمة العملاء</span>
<a href="https://wa.me/+01000665292" target="_blank">
    <img  src="{{asset('img/whatsapp.png')}}" alt="" style="width: 100px;height:100px">
</a>
</div>
<!--- End whatsapp -->

