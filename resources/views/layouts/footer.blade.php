<div class="footer pt-lg-5 pb-lg-5 pt-3 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-12">
                <label onclick="footer(1)">{{ __('main.help') }}<i class="fa-solid fa-angle-down"></i></label>
                <ul id="f1">
                    @foreach ($pages as $page)
                        @if ($page->id == 1 || $page->id == 2 || $page->id == 3)
                            @php
                                $export = json_decode($page->icerik, true);
                            @endphp 
                            <li><a href="{{ LaravelLocalization::localizeUrl('/info/'.$export["seoUrl"][app()->getLocale()]) }}">{{ $export["sayfaIsmi"][app()->getLocale()] }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 col-12">
                <label onclick="footer(2)">{{ __('main.contact') }} <i class="fa-solid fa-angle-down"></i></label>
                <ul id="f2">
                    @foreach ($pages as $page)
                        @if ($page->id == 13 || $page->id == 14 || $page->id == 15 || $page->id == 16 || $page->id == 17 || $page->id == 18 || $page->id == 19)
                            @php
                                $export = json_decode($page->icerik, true);
                            @endphp 
                            <li><a href="{{ LaravelLocalization::localizeUrl('/info/'.$export["seoUrl"][app()->getLocale()]) }}">{{ $export["sayfaIsmi"][app()->getLocale()] }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 col-12">
                <label onclick="footer(3)">{{ __('main.info') }} <i class="fa-solid fa-angle-down"></i></label>
                <ul id="f3">
                    @foreach ($pages as $page)
                        @if ($page->id == 4 || $page->id == 5 || $page->id == 6)
                            @php
                                $export = json_decode($page->icerik, true);
                            @endphp 
                            <li><a href="{{ LaravelLocalization::localizeUrl('/info/'.$export["seoUrl"][app()->getLocale()]) }}">{{ $export["sayfaIsmi"][app()->getLocale()] }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 col-12">
                <label onclick="footer(4)">{{ __('main.offer-for') }} <i class="fa-solid fa-angle-down"></i></label>
                <ul id="f4">
                    @foreach ($pages as $page)
                        @if ($page->id == 7 || $page->id == 8 || $page->id == 9 || $page->id == 10 || $page->id == 11 || $page->id == 12)
                            @php
                                $export = json_decode($page->icerik, true);
                            @endphp 
                            <li><a href="{{ LaravelLocalization::localizeUrl('/info/'.$export["seoUrl"][app()->getLocale()]) }}">{{ $export["sayfaIsmi"][app()->getLocale()] }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <input type="hidden" id="footer" value="0">
</div>
<div class="footer-two pt-lg-5 pb-lg-5 pt-3 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <a href="https://www.facebook.com/Yourmobileguide-112826530484533" target="_blank">
                    <img src="/images/social-media/facebook.svg" alt="YourMobileGuide Facebook" class="social-img">
                </a>
                
                <a href="https://www.instagram.com/yourmobileguide/" target="_blank">
                    <img src="/images/social-media/instagram.svg" alt="YourMobileGuide Instagram" class="social-img">
                </a>
                
                <a href="https://www.youtube.com/channel/UCaNCr2FnS9ejd41f71bhOHw?view_as=subscriber" target="_blank">
                    <img src="/images/social-media/youtube.svg" alt="YourMobileGuide Youtube" class="social-img">
                </a>

                <label>Copyright ©2022 All rights reserved by Check for Trips GmbH</label>
            </div>
            <div class="col-lg-6 col-12 text-lg-end text-start">
                <img src="/images/payment.webp" alt="Payment" class="payment-img"></br>

                <a href="https://apps.apple.com/app/yourmobileguide/id1557458035?l" target="_blank"><img src="/images/apple.webp" alt="Apple Store for Download App" class="app-img"></a>
                <a href="https://play.google.com/store/apps/details?id=com.yourmobileguide" target="_blank"><img src="/images/google.webp" alt="Google Play for Download App" class="app-img"></a>
            </div>
        </div>
    </div>
</div>

@if (Cookie::get('maskot')!=true)
    @foreach ($pages as $page)
        @if ($page->id == 4)
            @php
                $export = json_decode($page->icerik, true);
            @endphp 
            <div class="maskot" id="maskot">
                @if (request()->routeIs('info'))
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                        <hgroup class="bubble"><span>{{ __('main.consultation') }}</span></hgroup>
                    </a>
                @else
                    <a href="{{ LaravelLocalization::localizeUrl('/info/'.$export["seoUrl"][app()->getLocale()]) }}">
                        <hgroup class="bubble"><span>{{ __('main.maskot') }}</span></hgroup>
                    </a>
                @endif
                <img src="/images/maskot.svg" alt="Maskot">
                <a onclick="maskot()" href="#maskot"><i class="fa-solid fa-circle-xmark"></i></a>
            </div>

            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl location">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('main.consultation') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row text-center">
                                <div class="col-xl-3 col-lg-6 col-12 pb-xl-0 pb-4">
                                    <img src="/images/tuna_isik.webp" alt="Tuna Işık" width="50%" class="m-auto d-block">
                                    <strong>Tuna Işık</strong><br/>
                                    (Frankfurt am Main)<br/>
                                    tuna@yourmobileguide.com<br/>
                                    +49 6142 330 6673<br/><br/>
                                    {{ __('main.languages-spoken') }}<br/>
                                    <img src="/images/language/de.svg" width="20" class="language"> English <br/>
                                    <a href="https://wa.me/4961423306673" class="clasic-btn mb-2" target="_blank">{{ __('main.contact') }}</a>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 pb-xl-0 pb-4">
                                    <img src="/images/deniz_eronal.webp" alt="Deniz Erönal" width="50%" class="m-auto d-block">
                                    <strong>Deniz Erönal</strong><br/>
                                    (Berlin)<br/>
                                    de@yourmobileguide.com<br/>
                                    +49 0 173 6091861<br/><br/>
                                    {{ __('main.languages-spoken') }}<br/>
                                    <img src="/images/language/de.svg" width="20" class="language"> Deutsch
                                    <img src="/images/language/en.svg" width="20" class="language"> English <br/>
                                    <a href="https://wa.me/4901736091861" class="clasic-btn mb-2" target="_blank">{{ __('main.contact') }}</a>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 pb-xl-0 pb-4">
                                    <img src="/images/alexandra.webp" alt="Alexandra C. Yavasca" width="50%" class="m-auto d-block">
                                    <strong>Alexandra C. Yavasca</strong><br/>
                                    (Lisbon)<br/>
                                    alex.yavasca@yourmobileguide.com<br/>
                                    +351 963 459 662<br/><br/>
                                    {{ __('main.languages-spoken') }}<br/>
                                    <img src="/images/language/en.svg" width="20" class="language"> English <br/>
                                    <a href="https://wa.me/351963459662" class="clasic-btn mb-2" target="_blank">{{ __('main.contact') }}</a>
                                </div>
                                <div class="col-xl-3 col-lg-6 col-12 pb-xl-0 pb-4">
                                    <img src="/images/derya_saka.webp" alt="Derya Saka" width="50%" class="m-auto d-block">
                                    <strong>Derya Saka</strong><br/>
                                    (Istanbul)<br/>
                                    ds@yourmobileguide.com<br/>
                                    +90 531 720 78 99<br/><br/>
                                    {{ __('main.languages-spoken') }}<br/>
                                    <img src="/images/language/tr.svg" width="20" class="language"> Turkish <br/>
                                    <a href="https://wa.me/905317207899" class="clasic-btn mb-2" target="_blank">{{ __('main.contact') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif
