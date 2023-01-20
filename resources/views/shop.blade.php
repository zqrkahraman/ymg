@extends('layouts.index')

@section('title', "Audio Guides")
@section('description', "Audiotouren von örtlichen Reiseführern, Historikern und Archäologen ✓ Zeitlich flexibel & günstig ✓Mehr hier...")

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
                                <img src="/images/language/{{ $country["flag"] }}.svg" alt="{{ $country["flag"] }}">
                                {{ $country_name[app()->getLocale()] }}
                            </a>
                        </div>
                    @endforeach
                </div>           
                <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>

    <div class="pt-md-1 pb-md-5 pt-1 pb-4 shop">
        <div class="container pt-4">
            <div class="row">
                <div class="title mb-3">
                    <h3>{{ __('main.popular') }}</h3>
                    <a href="{{ route('filter', ['popular']) }}" class="clasic-btn2">{{ __('main.explore-all') }}</a>
                </div>
                <div class="col-12">
                    <div class="swiper slider1 product">
                        <div class="swiper-wrapper">
                            @foreach ($products as $key => $value)
                                <div class="swiper-slide pb-2" itemtype="https://schema.org/Product" itemscope>
                                    <a href="{{ LaravelLocalization::localizeUrl('/audioguides/'.$country_slugs[$key][app()->getLocale()].'/'.$city_slugs[$key][app()->getLocale()].'/'.$value['sef_link'].'') }}">
                                        <img itemprop="image" src="/images/product/{{$value->resim}}" alt="{!! $value->adi !!}" class="cropped">
                                        <div class="language">
                                            @if (is_array($audioguides_language[$key]) || is_object($audioguides_language[$key]))
                                                @foreach ($audioguides_language[$key] as $item)
                                                    <img src="/images/language/{{ $item }}.svg" alt="language">
                                                @endforeach 
                                            @endif
                                        </div>
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
                                        
                                        <div class="comments" itemprop="aggregateRating" itemtype="https://schema.org/AggregateRating" itemscope>
                                            <div class="star-rating">
                                                <div class="star-rating-inner active" style="width: @if (isset($star[$value->urun_id]))@foreach ($star[$value->urun_id] as $item){{ $item }}%@endforeach @endif;"></div>
                                            </div>
                                            <strong itemprop="ratingValue">@if (isset($raiting[$value->urun_id]))@foreach ($raiting[$value->urun_id] as $item){{ $item }}@endforeach @endif</strong> 
                                            <label itemprop="reviewCount">(@if (isset($comments_count[$value->urun_id]))@foreach ($comments_count[$value->urun_id] as $item){{ $item }}@endforeach @endif {{ __('reviews') }})</label>
                                        </div>

                                        <div class="price @if($value->orjinal_fiyat==0) green @endif" itemprop="offers" itemtype="https://schema.org/AggregateOffer" itemscope>
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

                                        <meta itemprop="sku" content="{{$value->urun_id}}" />
                                        <div itemprop="brand" itemtype="https://schema.org/Brand" itemscope>
                                            <meta itemprop="name" content="YourMobileGuide" />
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

        <div class="container pt-4">
            <div class="row">
                <div class="title mb-3">
                    <h3>{{ __('main.new-audio-guides') }}</h3>
                    <a href="{{ route('filter', ['new-audio-guides']) }}" class="clasic-btn2">{{ __('main.explore-all') }}</a>
                </div>
                <div class="col-12">
                    <div class="swiper slider1 product">
                        <div class="swiper-wrapper">
                            @foreach ($products2 as $key => $value)
                                <div class="swiper-slide pb-2" itemtype="https://schema.org/Product" itemscope>
                                    <a href="{{ LaravelLocalization::localizeUrl('/audioguides/'.$country_slugs2[$key][app()->getLocale()].'/'.$city_slugs2[$key][app()->getLocale()].'/'.$value['sef_link'].'') }}">
                                        <img itemprop="image" src="/images/product/{{$value->resim}}" alt="{!! $value->adi !!}" class="cropped">
                                        <div class="language">
                                            @if (is_array($audioguides_language2[$key]) || is_object($audioguides_language2[$key]))
                                                @foreach ($audioguides_language2[$key] as $item)
                                                    <img src="/images/language/{{ $item }}.svg" alt="language">
                                                @endforeach 
                                            @endif
                                        </div>
                                        <h3 itemprop="name">{!! $value->adi !!}</h3>
                                        <label itemprop="description">{!! $value->alt_baslik !!}</label>
                                        
                                        @if ($addition2[$key]['saatIconlar'] || $addition2[$key]['istasyoIconlar'] || $addition2[$key]['mesafeIconlar'])
                                            <div class="feature">
                                                <ul>
                                                    @if ($addition2[$key]['saatIconlar'])
                                                        <li>
                                                            <i class="fa-solid fa-clock"></i>
                                                            {!! $addition2[$key]['saatIconlar'] !!}
                                                        </li>
                                                    @endif
                                                    @if ($addition2[$key]['istasyoIconlar'])
                                                        <li>
                                                            <i class="fa-solid fa-route"></i>
                                                            {!! $addition2[$key]['istasyoIconlar'] !!}
                                                        </li>
                                                    @endif
                                                    @if ($addition2[$key]['mesafeIconlar'])
                                                        <li>
                                                            <i class="fa-solid fa-shoe-prints"></i>
                                                            {!! $addition2[$key]['mesafeIconlar'] !!}
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="popular">
                                            <ul>
                                                @if ($properties2[$key]['new_product'] == 1 )
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

                                        <div class="comments" itemprop="aggregateRating" itemtype="https://schema.org/AggregateRating" itemscope>
                                            <div class="star-rating">
                                                <div class="star-rating-inner active" style="width: @if (isset($star2[$value->urun_id]))@foreach ($star2[$value->urun_id] as $item){{ $item }}%@endforeach @endif;"></div>
                                            </div>
                                            <strong itemprop="ratingValue">@if (isset($raiting2[$value->urun_id]))@foreach ($raiting2[$value->urun_id] as $item){{ $item }}@endforeach @endif</strong> 
                                            <label itemprop="reviewCount">(@if (isset($comments_count_2[$value->urun_id]))@foreach ($comments_count_2[$value->urun_id] as $item){{ $item }}@endforeach @endif {{ __('reviews') }})</label>
                                        </div>

                                        <div class="price @if($value->orjinal_fiyat==0) green @endif">
                                            @if ($discount_rate2[$key]>0)
                                                <div class="discount-price">
                                                    <i class="fa-solid fa-euro-sign"></i> {{ number_format($value->orjinal_fiyat, 2) }}
                                                </div>
                                                <i class="fa-solid fa-euro-sign"></i> {{ number_format($unit_price2[$key], 2) }}
                                                <div class="discount bg-green">
                                                    Save {{ $discount_rate2[$key] }}%
                                                </div>
                                            @elseif($value->orjinal_fiyat==0)
                                                {{ __('main.free') }}
                                            @else
                                                <i class="fa-solid fa-euro-sign"></i> {{ number_format($value->orjinal_fiyat, 2) }}
                                            @endif
                                            
                                            <meta itemprop="lowPrice" content="{{ number_format($unit_price2[$key], 2) }}" />
                                            <meta itemprop="highPrice" content="{{ number_format($value->orjinal_fiyat, 2) }}" />
                                            <meta itemprop="priceCurrency" content="EUR" />
                                        </div>

                                        <meta itemprop="sku" content="{{$value->urun_id}}" />
                                        <div itemprop="brand" itemtype="https://schema.org/Brand" itemscope>
                                            <meta itemprop="name" content="YourMobileGuide" />
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

        <div class="container pt-4">
            <div class="advantage">
                <div class="images">
                    <img src="/images/advantage.jpg" alt="Advantage">
                </div>
                <div class="text">
                    <h3>Advantage</h3>
                    <ol>
                        <li>
                            User Friendly
                        </li>
                        <li>
                            Be flexible
                            <strong>You determine the start time and pace</strong>
                        </li>
                        <li>
                            Individual Travel
                            <strong>You don't dependent on a group!</strong>
                        </li>
                        <li>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="container pt-4">
            <div class="row">
                <div class="title mb-3">
                    <h3>{{ __('main.best-cities') }}</h3>
                    <a href="{{ route('filter', ['best-city']) }}" class="clasic-btn2">{{ __('main.explore-all') }}</a>
                </div>
                <div class="col-12">
                    <div class="swiper slider1 product">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide pb-2">
                                <a href="#">
                                    <img src="/images/product/product.jpg" alt="Product Title" class="cropped">
                                    <div class="language">
                                        <img src="/images/language/en.svg" alt="language">
                                        <img src="/images/language/de.svg" alt="language">
                                    </div>
                                    <h3>Lisbon: Tour of Belém - Navigating Through the Past of a Seafaring Nation</h3>
                                    <label>Belém is known for its world-class museums, centuries-old architecture and the country's best pastries. Join us for a breathtaking guided tour!</label>
                                    <div class="feature">
                                        <ul>
                                            <li>
                                                <i class="fa-solid fa-clock"></i>
                                                On foot 1 hour
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-route"></i>
                                                9 Stations
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-shoe-prints"></i>
                                                2,4 km
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="popular">
                                        <ul>
                                            <li class="blue">Bestseller</li>
                                            <li class="brown">Instant Confirmation</li>
                                            <li class="orange">Available Today</li>
                                            <li class="grey">Free Cancelation</li>
                                        </ul>
                                    </div>
                                    <div class="comments">
                                        <div class="star-rating">
                                            <div class="star-rating-inner active" style="width: 90%;"></div>
                                        </div>
                                        <strong>3.6</strong> <label>(2,765 reviews)</label>
                                    </div>
                                    <div class="price">
                                        <i class="fa-solid fa-euro-sign"></i> 4.49
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide pb-2">
                                <a href="#">
                                    <img src="/images/product/product_2.jpg" alt="Product Title" class="cropped">
                                    <div class="language">
                                        <img src="/images/language/en.svg" alt="language">
                                        <img src="/images/language/de.svg" alt="language">
                                    </div>
                                    <h3>Free Istanbul City Guide by YourMobileGuide:</h3>
                                    <label>Your Digital Travel Guide with Offline Map, Tips, Tickets & more</label>
                                    <div class="feature">
                                        <ul>
                                            <li>
                                                <i class="fa-solid fa-route"></i>
                                                9 Stations
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="popular">
                                        <ul>
                                            <li class="blue">Bestseller</li>
                                            <li class="brown">Instant Confirmation</li>
                                            <li class="orange">Available Today</li>
                                            <li class="grey">Free Cancelation</li>
                                        </ul>
                                    </div>
                                    <div class="comments">
                                        <div class="star-rating">
                                            <div class="star-rating-inner active" style="width: 15%;"></div>
                                        </div>
                                        <strong>4.6</strong> <label>(3,765 reviews)</label>
                                    </div>
                                    <div class="price green">
                                        Free
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide pb-2">
                                <a href="#">
                                    <img src="/images/product/product_3.jpg" alt="Product Title" class="cropped">
                                    <div class="language">
                                        <img src="/images/language/en.svg" alt="language">
                                        <img src="/images/language/de.svg" alt="language">
                                    </div>
                                    <h3>Budapest City Center and Jewish Quarter Tour - From the Middle Ages to the Holocaust</h3>
                                    <label>Kontorhausviertel, Speicherstadt, HafenCity, Elbphilharmonie, Old Town, Jungfernstieg, River Alster and much more. With this tour you will not miss any sight!</label>
                                    <div class="feature">
                                        <ul>
                                            <li>
                                                <i class="fa-solid fa-clock"></i>
                                                On foot 1 hour
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-route"></i>
                                                9 Stations
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-shoe-prints"></i>
                                                2,4 km
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="popular">
                                        <ul>
                                            <li class="blue">Bestseller</li>
                                            <li class="brown">Instant Confirmation</li>
                                            <li class="orange">Available Today</li>
                                            <li class="grey">Free Cancelation</li>
                                        </ul>
                                    </div>
                                    <div class="comments">
                                        <div class="star-rating">
                                            <div class="star-rating-inner active" style="width: 35%;"></div>
                                        </div>
                                        <strong>4.2</strong> <label>(2,985 reviews)</label>
                                    </div>
                                    <div class="price">
                                        <div class="discount-price">
                                            <i class="fa-solid fa-euro-sign"></i> 4.49
                                        </div>
                                        <i class="fa-solid fa-euro-sign"></i> 3.49
                                        <div class="discount bg-green">
                                            Save 11%
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide pb-2">
                                <a href="#">
                                    <img src="/images/product/product_4.jpg" alt="Product Title" class="cropped">
                                    <div class="language">
                                        <img src="/images/language/en.svg" alt="language">
                                        <img src="/images/language/de.svg" alt="language">
                                    </div>
                                    <h3>UNESCO World Heritage City of Salzburg - A Day in the City of Mozart</h3>
                                    <label>City of Mozart, UNESCO World Heritage Site, The Sound of Music City, Festival City... Discover Salzburg by land and water!</label>
                                    <div class="feature">
                                        <ul>
                                            <li>
                                                <i class="fa-solid fa-clock"></i>
                                                On foot 1 hour
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-route"></i>
                                                9 Stations
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-shoe-prints"></i>
                                                2,4 km
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="popular">
                                        <ul>
                                            <li class="blue">Bestseller</li>
                                            <li class="grey">Free Cancelation</li>
                                        </ul>
                                    </div>
                                    <div class="comments">
                                        <div class="star-rating">
                                            <div class="star-rating-inner active" style="width: 99%;"></div>
                                        </div>
                                        <strong>3.6</strong> <label>(2,765 reviews)</label>
                                    </div>
                                    <div class="price">
                                        <i class="fa-solid fa-euro-sign"></i> 4.49
                                    </div>
                                </a>
                            </div>
                            
                            <div class="swiper-slide pb-2">
                                <a href="#">
                                    <img src="/images/product/product.jpg" alt="Product Title" class="cropped">
                                    <div class="language">
                                        <img src="/images/language/en.svg" alt="language">
                                        <img src="/images/language/de.svg" alt="language">
                                    </div>
                                    <h3>Lisbon: Tour of Belém - Navigating Through the Past of a Seafaring Nation</h3>
                                    <label>Belém is known for its world-class museums, centuries-old architecture and the country's best pastries. Join us for a breathtaking guided tour!</label>
                                    <div class="feature">
                                        <ul>
                                            <li>
                                                <i class="fa-solid fa-clock"></i>
                                                On foot 1 hour
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-code-merge"></i>
                                                9 Stations
                                            </li>
                                            <li>
                                                <i class="fa-solid fa-shoe-prints"></i>
                                                2,4 km
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="popular">
                                        <ul>
                                            <li class="blue">Bestseller</li>
                                            <li class="brown">Instant Confirmation</li>
                                            <li class="orange">Available Today</li>
                                            <li class="grey">Free Cancelation</li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>                
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container pt-4">
            <a href="{{ route('filter', ['all']) }}" class="see-all-bg">
                <div class="see-all">
                    <img src="/images/see-all.jpg" alt="{{ __('main.see-all') }}">
                    <div>
                        {{ __('main.audio-guides') }}
                        <strong>{{ __('main.see-all') }} {{ __('main.audio-guides') }}</strong>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection