@extends('layouts.index')

@section('title', __('main.audio-guides').' | '.$filter_title)
@section('description', $filter_description)

@section('content')
    <div class="filter pt-4">
        <div class="container">
            <h3>Select Cities & Regions</h3>
            You can choose the city or region you want to go to.

            <div class="swiper slider3 pt-4">
                <div class="swiper-wrapper">
                    @foreach ($countries as $country)
                        @php
                            $country_name = json_decode(stripcslashes($country["adi"]), true);
                            $country_slug = json_decode($country["sef_link"], true);
                        @endphp
                        <div class="swiper-slide pb-2">
                            <a href="{{ LaravelLocalization::localizeUrl('/audioguides/'.$country_slug[app()->getLocale()].'') }}">
                                <img src="/images/language/{{ $country["flag"] }}.svg">
                                {{ $country_name[app()->getLocale()] }}
                            </a>
                        </div>
                    @endforeach
                </div>           
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>

    <div class="pt-md-1 pb-md-5 pt-1 pb-4 shop shop-all">
        <div class="container pt-4">
            <div class="row">
                <div class="title mb-3">
                    <div>
                        <a href="{{ LaravelLocalization::localizeUrl('/audioguides') }}">Audio Guides</a> <i class="fa-solid fa-angle-right"></i> <strong>{{ $filter_title }}</strong>
                    </div>
                    <div>
                        {{ count($products) }} search results
                    </div>
                </div>
                <div class="product product-horizontal">
                    <div class="container">
                        @foreach ($products as $key => $value)
                            <a href="{{ LaravelLocalization::localizeUrl('/audioguides/'.$country_slug[app()->getLocale()].'/'.$city_slugs[$key][app()->getLocale()].'/'.$value['sef_link']) }}">
                                <div class="row mb-3" itemtype="https://schema.org/Product" itemscope>
                                    <div class="col-xl-3 col-lg-4 col-md-12 col-12 p-0">
                                        <img itemprop="image" src="/images/product/{{$value->resim}}" alt="{!! $value->adi !!}" class="cropped">
                                        <div class="language">
                                            @if (is_array($audioguides_language[$key]) || is_object($audioguides_language[$key]))
                                                @foreach ($audioguides_language[$key] as $item)
                                                    <img src="/images/language/{{ $item }}.svg">
                                                @endforeach 
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-6 col-md-8 col-12 p-0">
                                        <h3 itemprop="name">{!! $value->adi !!}</h3>
                                        <label itemprop="description">{!! $value->alt_baslik !!}</label>
                                    
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
                                    </div>
                                    <div class="col-xl-2 col-lg-2 col-md-4 col-12 p-0 pt-2 text-md-end text-start">
                                        <div class="comments" itemprop="aggregateRating" itemtype="https://schema.org/AggregateRating" itemscope>
                                            <strong itemprop="ratingValue">@if (isset($raiting[$value->urun_id]))@foreach ($raiting[$value->urun_id] as $item){{ $item }}@endforeach @endif</strong> 
                                            <div class="star-rating">
                                                <div class="star-rating-inner active" style="width: @if (isset($star[$value->urun_id]))@foreach ($star[$value->urun_id] as $item){{ $item }}%@endforeach @endif;"></div>
                                            </div>
                                            <label itemprop="reviewCount">(@if (isset($comments_count[$value->urun_id]))@foreach ($comments_count[$value->urun_id] as $item){{ $item }}@endforeach @endif {{ __('reviews') }})</label>
                                        </div>
                                        <div class="price @if($value->orjinal_fiyat==0) green @endif">
                                            @if ($discount_rate[$key]>0)
                                                <div class="discount-price">
                                                    <i class="fa-solid fa-euro-sign"></i> {{ number_format($value->orjinal_fiyat, 2) }}
                                                </div>
                                                <i class="fa-solid fa-euro-sign"></i> {{ number_format($unit_price[$key], 2) }}
                                                <div class="discount bg-green">
                                                    Save {{ $discount_rate[$key] }}%
                                                </div>
                                            @elseif($value->orjinal_fiyat==0)
                                                {{ __('main.free') }}
                                            @else
                                                <i class="fa-solid fa-euro-sign"></i> {{ number_format($value->orjinal_fiyat, 2) }}
                                            @endif

                                            <meta itemprop="lowPrice" content="{{ number_format($unit_price[$key], 2) }}" />
                                            <meta itemprop="highPrice" content="{{ number_format($value->orjinal_fiyat, 2) }}" />
                                            <meta itemprop="priceCurrency" content="EUR" />
                                        </div>
                                    </div>
                                </div>

                                <meta itemprop="sku" content="{{$value->urun_id}}" />
                                <div itemprop="brand" itemtype="https://schema.org/Brand" itemscope>
                                    <meta itemprop="name" content="YourMobileGuide" />
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection