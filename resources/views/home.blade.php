@extends('layouts.index')

@section('title', 'Your Mobile Guide | Audioguide App System')
@section('description', 'Audiotouren von örtlichen Reiseführern, Historikern und Archäologen ✓Zeitlich flexibel & günstig ✓Mehr hier...')

@section('content')
    <div class="bg-ymg-color info-1">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <img src="../images/logo_white.svg" alt="YourMobileGuide" width="360" class="mob">
                    <div class="ps-0 ps-md-4 text-center text-lg-start">
                        <h1 class="p-lg-0 pt-4 pb-3">YourMobileGuide </h1>
                        <h2 class="pt-lg-3 pt-0">
                            @foreach ($ceviriler as $value)
                                @if ($value->ceviri_key == 'home-text' && $value->dil_id == $dil_id)
                                    {{ $value->ceviri }}
                                @endif
                            @endforeach
                        </h2>
                        <div class="info-btn mt-lg-4 mb-lg-4 mt-3 mb-3 p-lg-3 p-lg-3">
                            @foreach ($ceviriler as $value)
                                @if ($value->ceviri_key == 'home-btn' && $value->dil_id == $dil_id)
                                    {{ $value->ceviri }}
                                @endif
                            @endforeach
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                            </svg>
                        </div>
                        <img src="../images/info_mobil_2.webp" alt="YourMobileGuide" width="360" class="web img">
                        <a href="https://apps.apple.com/app/yourmobileguide/id1557458035?l" target="_blank"><img
                                src="../images/apple.webp" alt="Apple Store for Download App" class="app-img"></a>
                        <a href="https://play.google.com/store/apps/details?id=com.yourmobileguide" target="_blank"><img
                                src="../images/google.webp" alt="Google Play for Download App" class="app-img"></a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="mobile-text p-lg-0 pt-4 pb-5 ps-4 pe-4">
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'home-text2' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="info-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 order-lg-0 order-1">
                    <img src="../images/info_2.webp" alt="YourMobileGuide" width="100%">
                </div>
                <div class="col-lg-6 col-12 order-lg-0 order-2">
                    <div class="text pt-lg-0 pb-lg-0 pt-4 pb-4">
                        <h3>
                            @foreach ($ceviriler as $value)
                                @if ($value->ceviri_key == 'ana-b-1' && $value->dil_id == $dil_id)
                                    {{ $value->ceviri }}
                                @endif
                            @endforeach
                        </h3>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'ana-b-2' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                        </br>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'ana-b-3' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                        </br></br>

                        <h3>
                            @foreach ($ceviriler as $value)
                                @if ($value->ceviri_key == 'ana-b-4' && $value->dil_id == $dil_id)
                                    {{ $value->ceviri }}
                                @endif
                            @endforeach
                        </h3>

                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'ana-b-5' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                        </br></br>
                        
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'ana-b-6' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-lg-0 order-4">
                    <div class="text pt-lg-0 pb-lg-0 pt-4 pb-4">
                        <h3>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'ana-b-7' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                        </h3>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'ana-b-8' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach</br></br>
                        <h3>
                            @foreach ($ceviriler as $value)
                                @if ($value->ceviri_key == 'ana-b-9' && $value->dil_id == $dil_id)
                                    {{ $value->ceviri }}
                                @endif
                            @endforeach
                        </h3>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'ana-b-10' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-lg-0 order-3">
                    <img src="../images/info_3.webp" alt="YourMobileGuide" width="100%">
                </div>
                <div class="col-lg-6 col-12 order-lg-0 order-5">
                    <img src="../images/info_4.webp" alt="YourMobileGuide" width="100%">
                </div>
                <div class="col-lg-6 col-12 order-lg-0 order-6">
                    <div class="text pt-lg-0 pb-lg-0 pt-4 pb-4">
                        <h3>
                            @foreach ($ceviriler as $value)
                                @if ($value->ceviri_key == 'ana-b-1' && $value->dil_id == $dil_id)
                                    {{ $value->ceviri }}
                                @endif
                            @endforeach
                        </h3>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'ana-b-2' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                        </br>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'ana-b-3' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                        </br></br>

                        <h3>
                            @foreach ($ceviriler as $value)
                                @if ($value->ceviri_key == 'ana-b-4' && $value->dil_id == $dil_id)
                                    {{ $value->ceviri }}
                                @endif
                            @endforeach
                        </h3>

                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'ana-b-5' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                        </br></br>
                        
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'ana-b-6' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-ymg-color info-3 pt-md-5 pb-md-5 pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-12">
                    <div class="text pe-lg-5 pe-0">
                        <ol class="list-groups">
                            <li class="list-items mb-4">
                                @foreach ($ceviriler as $value)
                                    @if ($value->ceviri_key == 'wahlen_sie_ihren' && $value->dil_id == $dil_id)
                                        {{ $value->ceviri }}
                                    @endif
                                @endforeach
                            </li>
                            <li class="list-items mb-4">
                                @foreach ($ceviriler as $value)
                                    @if ($value->ceviri_key == 'erhaltensieperemail' && $value->dil_id == $dil_id)
                                        {{ $value->ceviri }}
                                    @endif
                                @endforeach
                            </li>
                            <li class="list-items mb-4">
                                @foreach ($ceviriler as $value)
                                    @if ($value->ceviri_key == 'startensieihreaudiotour' && $value->dil_id == $dil_id)
                                        {{ $value->ceviri }}
                                    @endif
                                @endforeach
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <h3>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'wie_es_funktioniert' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                    </h3>

                    <div class="youtube-container">
                        <div class="youtube-player" data-id="m-d9chKhzvM"></div>
                    </div>

                    @foreach ($ceviriler as $value)
                        @if ($value->ceviri_key == 'siekonnendietour' && $value->dil_id == $dil_id)
                            {{ $value->ceviri }}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="pt-md-5 pb-md-5 pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 info-4">
                    <h3>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'audioguides' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                    </h3>
                    @foreach ($ceviriler as $value)
                        @if ($value->ceviri_key == 'jetztentdecken' && $value->dil_id == $dil_id)
                            {{ $value->ceviri }}
                        @endif
                    @endforeach
                    <a href="#" class="clasic-btn" target="_blank">
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'see-all-audio-guides' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                    </a>
                </div>

                <div class="col-12">
                    <div class="swiper slider1 product">
                        <div class="swiper-wrapper">
                            @foreach ($products as $key => $value)
                                <div class="swiper-slide pb-2">
                                    <a href="{{ $value['sef_link'] }}">
                                        <img src="../images/product/{{$value->resim}}" alt="{!! $value->adi !!}" class="cropped">
                                        <div class="language">
                                            @if (is_array($audioguides_language[$key]) || is_object($audioguides_language[$key]))
                                                @foreach ($audioguides_language[$key] as $item)
                                                    <img src="../images/language/{{ $item }}.svg" alt="language">
                                                @endforeach 
                                            @endif
                                        </div>
                                        <h3>{!! $value->adi !!}</h3>
                                        <label>{!! $value->alt_baslik !!}</label>
                                        
                                        @if ($addition[$key]['saatIconlar'] || $addition[$key]['istasyoIconlar'] || $addition[$key]['mesafeIconlar'])
                                            <div class="feature">
                                                <ul>
                                                    @if ($addition[$key]['saatIconlar'])
                                                        <li>
                                                            <i class="fa-solid fa-clock"></i>
                                                            {!! $addition[$key]['saatIconlar'] !!}
                                                        </li>
                                                    @endif
                                                    @if ($addition[$key]['istasyoIconlar'])
                                                        <li>
                                                            <i class="fa-solid fa-route"></i>
                                                            {!! $addition[$key]['istasyoIconlar'] !!}
                                                        </li>
                                                    @endif
                                                    @if ($addition[$key]['mesafeIconlar'])
                                                        <li>
                                                            <i class="fa-solid fa-shoe-prints"></i>
                                                            {!! $addition[$key]['mesafeIconlar'] !!}
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="popular">
                                            <ul>
                                                @if ($properties[$key]['new_product'] == 1 )
                                                    <li class="blue">{{ __('main.new-product') }}</li>
                                                @else
                                                    <li class="blue">{{ __('main.bestseller') }}</li>
                                                @endif
                                                
                                                <li class="brown">{{ __('main.instant-confirmation') }}</li>

                                                @if ($value['stok_durumu'] != 0 )
                                                    <li class="orange">{{ __('main.available-today') }}</li>
                                                @endif

                                                <li class="grey">{{ __('main.free-cancelation') }}</li>
                                            </ul>
                                        </div>
                                        <div class="comments">
                                            <div class="star-rating">
                                                <div class="star-rating-inner active" style="width: @if (isset($star[$value->urun_id]))@foreach ($star[$value->urun_id] as $item){{ $item }}%@endforeach @endif;"></div>
                                            </div>
                                            <strong>@if (isset($raiting[$value->urun_id]))@foreach ($raiting[$value->urun_id] as $item){{ $item }}@endforeach @endif</strong> 
                                            <label>(@if (isset($comments_count[$value->urun_id]))@foreach ($comments_count[$value->urun_id] as $item){{ $item }}@endforeach @endif {{ __('reviews') }})</label>
                                        </div>

                                        <div class="price @if($value->orjinal_fiyat==0) green @endif">
                                            @if ($discount_rate[$key]>0)
                                                <div class="discount-price">
                                                    <i class="fa-solid fa-euro-sign"></i> {{ number_format($value->orjinal_fiyat, 2) }}
                                                </div>
                                                <i class="fa-solid fa-euro-sign"></i> {{ number_format($value->fiyat, 2) }}
                                                <div class="discount bg-green">
                                                    Save {{ $discount_rate[$key] }}%
                                                </div>
                                            @elseif($value->orjinal_fiyat==0)
                                                {{ __('main.free') }}
                                            @else
                                                <i class="fa-solid fa-euro-sign"></i> {{ number_format($value->orjinal_fiyat, 2) }}
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-ymg-color info-5 pt-md-5 pb-md-5 pt-4 pb-4">
        <div class="container">
            <h3 class="pb-lg-5 pb-4">
                @foreach ($ceviriler as $value)
                    @if ($value->ceviri_key == 'four-steps-title' && $value->dil_id == $dil_id)
                        {{ $value->ceviri }}
                    @endif
                @endforeach
            </h3>
            <ol class="list-groups">
                <li class="list-items mb-4">
                    @foreach ($ceviriler as $value)
                        @if ($value->ceviri_key == 'four-steps-1' && $value->dil_id == $dil_id)
                            {{ $value->ceviri }}
                        @endif
                    @endforeach
                </li>
                <li class="list-items mb-4">
                    @foreach ($ceviriler as $value)
                        @if ($value->ceviri_key == 'four-steps-2' && $value->dil_id == $dil_id)
                            {{ $value->ceviri }}
                        @endif
                    @endforeach
                </li>
                <li class="list-items mb-4">
                    @foreach ($ceviriler as $value)
                        @if ($value->ceviri_key == 'four-steps-3' && $value->dil_id == $dil_id)
                            {{ $value->ceviri }}
                        @endif
                    @endforeach
                </li>
                <li class="list-items mb-4">
                    @foreach ($ceviriler as $value)
                        @if ($value->ceviri_key == 'four-steps-4' && $value->dil_id == $dil_id)
                            {{ $value->ceviri }}
                        @endif
                    @endforeach
                </li>
            </ol>
            <a href="#" class="clasic-btn" target="_blank">
                @foreach ($ceviriler as $value)
                    @if ($value->ceviri_key == 'asama-btn' && $value->dil_id == $dil_id)
                        {{ $value->ceviri }}
                    @endif
                @endforeach
            </a>
        </div>
    </div>

    <div class="info-6 pt-md-5 pb-md-5 pt-4 pb-4">
        <div class="container">
            <div class="row">
                <h3 class="pb-lg-5 pb-4 text-center">
                    @foreach ($ceviriler as $value)
                        @if ($value->ceviri_key == 'audiguideswoundwie' && $value->dil_id == $dil_id)
                            {{ $value->ceviri }}
                        @endif
                    @endforeach
                </h3>
                <div class="col-lg-6 col-12 order-lg-0 order-1 pt-3 pb-3">
                    <i class="fa-solid fa-person-hiking"></i>
                    <h4>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'walking-one' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                    </h4>
                    @foreach ($ceviriler as $value)
                        @if ($value->ceviri_key == 'walking-two' && $value->dil_id == $dil_id)
                            {{ $value->ceviri }}
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-6 col-12 order-lg-0 order-2 pt-3 pb-3">
                    <img src="../images/tour_image.webp" alt="YourMobileGuide" width="100%">
                </div>

                <div class="col-lg-6 col-12 order-lg-0 order-3 pt-3 pb-3">
                    <img src="../images/bus_image.webp" alt="YourMobileGuide" width="100%">
                </div>
                <div class="col-lg-6 col-12 order-lg-0 order-2 pt-3 pb-3">
                    <i class="fa-solid fa-bus"></i>
                    <h4>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'bus-one' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                    </h4>
                    @foreach ($ceviriler as $value)
                        @if ($value->ceviri_key == 'bus-two' && $value->dil_id == $dil_id)
                            {{ $value->ceviri }}
                        @endif
                    @endforeach
                </div>

                <div class="col-lg-6 col-12 order-lg-0 order-3 pt-3 pb-3">
                    <i class="fa-solid fa-car"></i>
                    <h4>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'car-one' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                    </h4>
                    @foreach ($ceviriler as $value)
                        @if ($value->ceviri_key == 'car-two' && $value->dil_id == $dil_id)
                            {{ $value->ceviri }}
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-6 col-12 order-lg-0 order-4 pt-3 pb-3">
                    <img src="../images/car_image.webp" alt="YourMobileGuide" width="100%">
                </div>

                <div class="col-lg-6 col-12 order-lg-0 order-5 pt-3 pb-3">
                    <img src="../images/bicycle_image.webp" alt="YourMobileGuide" width="100%">
                </div>
                <div class="col-lg-6 col-12 order-lg-0 order-4 pt-3 pb-3">
                    <i class="fa-solid fa-bicycle"></i>
                    <h4>
                        @foreach ($ceviriler as $value)
                            @if ($value->ceviri_key == 'bike-one' && $value->dil_id == $dil_id)
                                {{ $value->ceviri }}
                            @endif
                        @endforeach
                    </h4>
                    @foreach ($ceviriler as $value)
                        @if ($value->ceviri_key == 'bike-two' && $value->dil_id == $dil_id)
                            {{ $value->ceviri }}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="bg-ymg-color info-7 pt-md-5 pb-md-5 pt-4 pb-4">
        <div class="container">
            <div class="row">
                <h3 class="pb-lg-5 pb-4">
                    @foreach ($ceviriler as $value)
                        @if ($value->ceviri_key == 'wasunsereautorensagen' && $value->dil_id == $dil_id)
                            {{ $value->ceviri }}
                        @endif
                    @endforeach
                </h3>
                <div class="col-12">
                    <div class="swiper slider2 pb-5">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-3 pb-5">
                                        <div class="images" style="background-image: url(./images/general_reviews/gizem.webp)"></div>
                                    </div>
                                    <div class="col-lg-8 col-9 pb-5">
                                        <div class="title">{{ __('general_reviews.gizem.name') }}</div>
                                        <div class="sub-title">{{ __('general_reviews.gizem.city-country') }}</div>
                                        <div class="description">{{ __('general_reviews.gizem.text') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-3 pb-5">
                                        <div class="images" style="background-image: url(./images/general_reviews/yasemin_alayli.webp)">
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-9 pb-5">
                                        <div class="title">{{ __('general_reviews.yasemin.name') }}</div>
                                        <div class="sub-title">{{ __('general_reviews.yasemin.city-country') }}</div>
                                        <div class="description">{{ __('general_reviews.yasemin.text') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-3 pb-5">
                                        <div class="images" style="background-image: url(./images/general_reviews/sabine.webp)"></div>
                                    </div>
                                    <div class="col-lg-8 col-9 pb-5">
                                        <div class="title">{{ __('general_reviews.sabine.name') }}</div>
                                        <div class="sub-title">{{ __('general_reviews.sabine.city-country') }}</div>
                                        <div class="description">{{ __('general_reviews.sabine.text') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-3 pb-5">
                                        <div class="images" style="background-image: url(./images/general_reviews/kerstin.webp)"></div>
                                    </div>
                                    <div class="col-lg-8 col-9 pb-5">
                                        <div class="title">{{ __('general_reviews.kerstin.name') }}</div>
                                        <div class="sub-title">{{ __('general_reviews.kerstin.city-country') }}</div>
                                        <div class="description">{{ __('general_reviews.kerstin.text') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-3 pb-5">
                                        <div class="images" style="background-image: url(./images/general_reviews/heike.webp)"></div>
                                    </div>
                                    <div class="col-lg-8 col-9 pb-5">
                                        <div class="title">{{ __('general_reviews.heike.name') }}</div>
                                        <div class="sub-title">{{ __('general_reviews.heike.city-country') }}</div>
                                        <div class="description">{{ __('general_reviews.heike.text') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-3 pb-5">
                                        <div class="images" style="background-image: url(./images/general_reviews/kerim.webp)"></div>
                                    </div>
                                    <div class="col-lg-8 col-9 pb-5">
                                        <div class="title">{{ __('general_reviews.kerim.name') }}</div>
                                        <div class="sub-title">{{ __('general_reviews.kerim.city-country') }}</div>
                                        <div class="description">{{ __('general_reviews.kerim.text') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-3 pb-5">
                                        <div class="images" style="background-image: url(./images/general_reviews/thomas.webp)"></div>
                                    </div>
                                    <div class="col-lg-8 col-9 pb-5">
                                        <div class="title">{{ __('general_reviews.thomas.name') }}</div>
                                        <div class="sub-title">{{ __('general_reviews.thomas.city-country') }}</div>
                                        <div class="description">{{ __('general_reviews.thomas.text') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-3 pb-5">
                                        <div class="images" style="background-image: url(./images/general_reviews/liane.webp)"></div>
                                    </div>
                                    <div class="col-lg-8 col-9 pb-5">
                                        <div class="title">{{ __('general_reviews.liane.name') }}</div>
                                        <div class="sub-title">{{ __('general_reviews.liane.city-country') }}</div>
                                        <div class="description">{{ __('general_reviews.liane.text') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-3 pb-5">
                                        <div class="images" style="background-image: url(./images/general_reviews/burak_kaptan.webp)"></div>
                                    </div>
                                    <div class="col-lg-8 col-9 pb-5">
                                        <div class="title">{{ __('general_reviews.burak.name') }}</div>
                                        <div class="sub-title">{{ __('general_reviews.burak.city-country') }}</div>
                                        <div class="description">{{ __('general_reviews.burak.text') }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-lg-4 col-3 pb-5">
                                        <div class="images" style="background-image: url(./images/general_reviews/alexandra.webp)"></div>
                                    </div>
                                    <div class="col-lg-8 col-9 pb-5">
                                        <div class="title">{{ __('general_reviews.alexandra.name') }}</div>
                                        <div class="sub-title">{{ __('general_reviews.alexandra.city-country') }}</div>
                                        <div class="description">{{ __('general_reviews.alexandra.text') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
