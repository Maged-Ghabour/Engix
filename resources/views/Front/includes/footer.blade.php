<!-- Start Footer Area -->
<footer class="footer">
    <!-- Start Footer Middle -->
    <div class="footer-middle">
        <div class="container">
            <div class="bottom-inner">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-contact">
                            <h3>{{__('app.GetInTouchWithUs')}}</h3>

                            <ul>
                                <li class="phone">{{__('app.phone')}}: <a tel="{{__('app.phoneNumber')}}">{{__('app.phoneNumber')}}</a> </li>
                                <li>
                                    <span> {{__('app.timesOfWork')}}:</span>
                                    {{__('app.Saturday-Thursday')}}
                                    <span>{{__('app.10.00 am')}} - {{__('app.08.00 pm')}}</span>
                                </li>

                                <li class="mail">
                                    {{__('app.email')}} : <a href="mailto:support@shopgrids.com">Engix@gmail.com</a>
                                </li>

                            </ul>

                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>{{__('app.information')}}</h3>
                            <ul>
                                <li>
                                    <a href="{{ route('who') }}">{{__('app.about')}}</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact_us.index') }}">{{__('app.contact')}}</a>
                                </li>
                                {{-- <li>
                                    <a href="{{route ('uses') }}"></a>
                                </li> --}}

                                {{-- <li>
                                    <a href="javascript:void(0)"></a>
                                </li> --}}
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>{{__('app.usage')}}</h3>
                            <ul>
                                <li>
                                    <a href="{{ route('polices') }}">{{__('app.privacyPolicy')}}</a>
                                </li>
                                <li>
                                    <a href="{{ route('uses') }}">{{__('app.TermsOfUse')}}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('rules') }}">{{__('app.TermsAndConditions')}}</a>
                                </li>

                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Middle -->
    <!-- Start Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-12">
                        {{-- <div class="payment-gateway">
                            <span>We Accept:</span>
                            <img src="assets/images/footer/credit-cards-footer.png" alt="#" />
                        </div> --}}
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="copyright">
                            <p>
                                Designed and Developed by<a href="https://graygrids.com/" rel="nofollow"
                                    target="_blank">itian team</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <ul class="socila">
                            <li>
                                <span>{{__('app.followUs')}}</span>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-google"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Bottom -->
</footer>
<!--/ End Footer Area -->

<!-- ========================= scroll-top ========================= -->
<a href="#" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
</a>
