@extends('layouts.index')

@section('title', $meta_title)
@section('description', $meta_description)

@section('content')
    <div class="product-detail pt-4" itemtype="https://schema.org/Product" itemscope>
        <div class="container">
            <div class="shortcut mb-3">
                <a href="../../../audioguides">Audio Guides</a> 
                <i class="fa-solid fa-angle-right"></i> 
                <a href="../../{{ $country_slug[app()->getLocale()] }}">{{ $country_name[app()->getLocale()] }}</a>
                <i class="fa-solid fa-angle-right"></i>
                <strong>{{ $city_name[app()->getLocale()] }}</strong> 
            </div>
            <h1 itemprop="name">{!! $name !!}</h1>

            <div class="comments mb-2" itemprop="aggregateRating" itemtype="https://schema.org/AggregateRating" itemscope>
                <div onclick="comments()">
                    <div class="star-rating">
                        <div class="star-rating-inner active" style="width: {{ $star }}%;"></div>
                    </div>
                    <strong itemprop="ratingValue">{{ $raiting }}</strong> 
                    <label itemprop="reviewCount">{{ $comments_count }} {{ __('main.reviews') }})</label>
                </div>
            </div>

            <div class="language">
                @if (is_array($audioguides_language) || is_object($audioguides_language))
                    @foreach ($audioguides_language as $item)
                        <img src="/images/language/{{ $item }}.svg" alt="language">
                    @endforeach 
                @endif
            </div>
            
            <div class="swiper slider5">
                <div class="swiper-wrapper">
                    @foreach ($images as $item)
                        @php
                            $images_title = json_decode(stripcslashes($item["baslik"]), true);
                        @endphp
                        <div class="swiper-slide">
                            <img itemprop="image" src="/images/product/{{$item->resim}}" alt="{{$images_title[app()->getLocale()]}}" class="cropped">
                        </div>
                    @endforeach
                </div>                
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

        <div class="container mt-lg-3 mt-0">
            <div class="row">
                <div class="col-lg-8 col-12 order-lg-1 order-2">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($description ?? [] as $key => $item)
                            @php
                                $description_title = $item["baslik"];
                            @endphp
                            <li class="nav-item" role="presentation">
                                <button class="nav-link @if($key==0) active @endif" id="asc{{$key}}-tab" data-bs-toggle="tab" data-bs-target="#asc{{$key}}-tab-pane" type="button" role="tab" aria-controls="asc{{$key}}-tab-pane" aria-selected="@if($key==0) true @else false @endif">{{$description_title[app()->getLocale()]}}</button>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="myTabContent" itemprop="description">
                        @foreach ($description ?? [] as $key => $item)
                            @php
                                $description_description = $item["aciklama"];
                            @endphp
                            <div class="tab-pane fade pt-3 pb-3 @if($key==0) show active @endif" id="asc{{$key}}-tab-pane" role="tabpanel" aria-labelledby="asc{{$key}}-tab" tabindex="0">
                                {!! $description_description[app()->getLocale()] !!}
                            </div>
                        @endforeach
                    </div>

                    <div x-data="$store.checkavailability">
                        <div class="checkavailability p-lg-4 p-3" id="checkavailability">
                            <span>{{ __('main.select-person-date') }}</span>
                            <div class="blue-area">
                                <div class="dropdown" id="dropdown1">
                                    <a class="btn bg-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-user"></i> Person x <label id="person">1</label>
                                    </a>
                                    
                                    <ul class="dropdown-menu">
                                        <div class="number">
                                            <div>Person</div> 
                                            <input type="button" x-on:click="save('minus')" value="-" class="minus">
                                            <input type="text" class="text-center" name="pax" x-model="pax">
                                            <input type="button" x-on:click="save('plus')" value="+" class="minus">
                                        </div>
                                    </ul>
                                </div>

                                {{-- <div class="dropdown" id="dropdown2">
                                    <a class="btn bg-white dropdown-toggle" x-on:click="date()" data-bs-auto-close="true" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-calendar-days"></i> <label id="date">{{ date('d/m/Y'); }}</label>
                                    </a>
                                    
                                    <ul class="dropdown-menu">
                                        <div class="datepicker" id="datepicker" data-date="{{ date('m/d/Y'); }}"></div>
                                        <input type="hidden" name="date" id="date-input" x-model="dates">
                                    </ul> 
                                </div> --}}

                                <div class="clasic-btn blue-btn btns" id="btns" x-on:click="save('check')">{{ __('main.check-availability') }}</div>
                                <input type='hidden' x-model="control">
                            </div>
                        </div>
                        <div class="availability mt-3 p-3" id="availability" x-show="open">
                            <div id="loading" x-show="loading"></div>
                            <div class="check" id="check">
                                <div class="form-check pe-lg-5 pe-0 ps-0 pb-4">
                                    <h4 class="mt-0 mb-2">About App</h4>
                                    <div class="time pb-2">Please do not close the page until the payment is completed and note that the application does not work on versions below Android 10 and IOS 13.</div>
                                    </div>
                                <div>
                                    <div class="total-price-text text-lg-end text-left">Total price</div>
                                    <div class="total-price text-lg-end text-left"><i class="fa-solid fa-euro-sign"></i> <label x-text="total_price">{{ number_format($unit_price, 2) }}</label></div>
                                    <div class="total-price-info text-lg-end text-left">All taxes and fees included</div>
                                    <div class="total-price-area">
                                        <div>Person <label id="person2">1</label> x <i class="fa-solid fa-euro-sign"></i> <label x-text="price">{{ number_format($unit_price, 2) }}</label></div>
                                        <div><i class="fa-solid fa-euro-sign"></i> <label x-text="total_price">0</label></div>
                                    </div>
                                    <div class="buy mt-3">
                                        <button type="submit" x-on:click="cart" class="clasic-btn blue-btn btns">{{ __('main.buy') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 product order-lg-2 order-1 mb-lg-0 mb-3">
                    <h4>{{ __('main.features') }}</h4>
                    @if ($addition['saatIconlar'] || $addition['istasyoIconlar'] || $addition['mesafeIconlar'])
                        <div class="feature">
                            <ul>
                                @if ($addition['saatIconlar'])
                                    <li>
                                        <i class="fa-solid fa-clock"></i>
                                        {!! $addition['saatIconlar'] !!}
                                    </li>
                                @endif
                                @if ($addition['istasyoIconlar'])
                                    <li>
                                        <i class="fa-solid fa-route"></i>
                                        {!! $addition['istasyoIconlar'] !!}
                                    </li>
                                @endif
                                @if ($addition['mesafeIconlar'])
                                    <li>
                                        <i class="fa-solid fa-shoe-prints"></i>
                                        {!! $addition['mesafeIconlar'] !!}
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endif

                    <div class="popular">
                        <ul>
                            @if ($properties['new_product'] == 1 )
                                <li class="blue">{{ __('main.new-product') }}</li>
                            @else
                                <li class="blue">{{ __('main.bestseller') }}</li>
                            @endif
                            
                            <li class="brown">{{ __('main.instant-confirmation') }}</li>

                            @if ($stock_status != 0 )
                                <li class="orange">{{ __('main.available-today') }}</li>
                            @endif

                            <li class="grey">{{ __('main.free-cancelation') }}</li>
                        </ul>
                    </div>

                    <div class="book-now">
                        <div class="price @if($orjinal_fiyat==0) green @endif">
                            @if ($discount_rate>0)
                                <div class="discount-price">
                                    <i class="fa-solid fa-euro-sign"></i> {{ number_format($orjinal_fiyat, 2) }}
                                </div>
                                <i class="fa-solid fa-euro-sign"></i> {{ number_format($unit_price, 2) }}
                                <div class="discount bg-green">
                                    Save {{ $discount_rate }}%
                                </div>
                            @elseif($orjinal_fiyat==0)
                                {{ __('main.free') }}
                            @else
                                <i class="fa-solid fa-euro-sign"></i> {{ number_format($orjinal_fiyat, 2) }}
                            @endif
                        </div>
                        <div>
                            <div onclick="bookNow()" class="clasic-btn blue-btn">{{ __('main.book-now') }}</div>
                        </div>

                        <meta itemprop="lowPrice" content="{{ number_format($unit_price, 2) }}" />
                        <meta itemprop="highPrice" content="{{ number_format($orjinal_fiyat, 2) }}" />
                        <meta itemprop="priceCurrency" content="EUR" />
                    </div>

                    <div class="see">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            <i class="fa-solid fa-location-dot"></i>
                            {{ __('main.see-location') }}
                        </a>

                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog location">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="map">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function initMap(){
                                var myLatLng = {lat: 52.518123, lng: 13.401895};
                                var map = new google.maps.Map(document.getElementById("map"), {
                                center: myLatLng,
                                zoom: 14
                                });
                                var marker = new google.maps.Marker({
                                map: map,
                                position: myLatLng
                                });
                            }
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgO5NzL3Yc63hRDBypWTcc2_S4CnNPbZo&callback=initMap" async defer></script>

                        <a href="#">
                            <i class="fa-solid fa-eye"></i>
                            {{ __('main.free-preview') }}
                        </a>

                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            <i class="fa-solid fa-circle-question"></i>
                            {{ __('main.how-it-works') }}
                        </a>

                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog frame">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            Wie funktioniert YourMobileGuide?
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ol>
                                            <li>Wählen Sie Ihren Audio Guide</li>
                                            <li>Erhalten Sie Ihren Zugangscode per E-Mail</li>
                                            <li>Starten Sie Ihre Audio Tour mit der App oder im Internetbrowser</li>
                                        </ol>

                                        <div class="youtube-player" data-id="m-d9chKhzvM"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                            <i class="fa-sharp fa-solid fa-circle-play"></i>
                            {{ __('main.listen-sample') }}
                        </a>
    
                        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog frame">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            {{ __('main.listen-sample') }}
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <audio controls>
                                            <source src="/voice/ses.mp3" type="audio/mpeg">
                                        </audio>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('main.close') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="free-preview">
                        <video autoplay loop muted width="270">
                            <source src="/images/ymg_preview.webm" type="video/webm">
                            <source src="/images/ymg_preview.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>

        <meta itemprop="sku" content="{{$product_id}}" />
        <div itemprop="brand" itemtype="https://schema.org/Brand" itemscope>
            <meta itemprop="name" content="YourMobileGuide" />
        </div>
    </div>

    <div class="container shop pt-4 mb-1">
        <div class="advantage">
            <div class="images">
                <img src="/images/advantage.webp" alt="Advantage">
            </div>
            <div class="text">
                <h3>{{ __('main.advantage.title') }}</h3>
                <ol>
                    <li>
                        {{ __('main.advantage.list1') }}
                    </li>
                    <li>
                        {{ __('main.advantage.list2') }}
                        <strong>{{ __('main.advantage.desc2') }}</strong>
                    </li>
                    <li>
                        {{ __('main.advantage.list3') }}
                        <strong>{{ __('main.advantage.desc3') }}</strong>
                    </li>
                    <li>
                        {{ __('main.advantage.desc4') }}
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container shop pt-4">
        <a href="../{{ $city_slug[app()->getLocale()] }}" class="see-all-bg">
            <div class="see-all">
                <img src="/images/see-all-3.webp" alt="{{ __('main.see-all') }}">
                <div>
                    {{ $city_name[app()->getLocale()] }}
                    <strong>{{ __('main.see-all') }} {{ $city_name[app()->getLocale()] }}</strong>
                </div>
            </div>
        </a>
    </div>

    <div class="container mb-5 mt-5">
        <div class="row customer-reviews" id="customer-reviews">
            <div class="col-lg-3 col-12">
                <h3>{{ __('main.comment.customer-reviews') }}</h3>

                {{ __('main.comment.overall-rating') }}</br>

                <div class="overall-rating text-lg-center text-start p-lg-4 p-0 pt-4 pb-4">
                    <h4>{{ $raiting }} <label>/ 5</label></h4>
                    <div class="comments">
                        <div class="star-rating">
                            <div class="star-rating-inner active" style="width: {{ $star }}%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="row">
                    @php $count=0; @endphp
                    @foreach ($comments as $comment)
                        <div class="col-md-10 col-12 reviews">
                            <div class="letter me-3">{{ $comment->isim[0] }}</div>
                            <div>
                                <strong>{{ $comment->isim }}</strong>
                                <br/>
                                <strong>{{ $comment->baslik }}</strong>
                                {{ $comment->yorum }}
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12 text-md-end text-center">
                            <div class="comments">
                                <div class="star-rating">
                                    <div class="star-rating-inner active" style="width: @if($comment->puan==1) 20% @elseif($comment->puan==2) 40% @elseif($comment->puan==3) 60% @elseif($comment->puan==4) 80% @else 100% @endif;"></div>
                                </div>
                            </div>
                            {{ date("d.m.Y", $comment->tarih) }}
                        </div>
            
                        <div class="col-12"><div class="line pt-3 mb-3"></div></div>
                        @php $count++; @endphp
                        @if ($count == 5) @break @endif
                    @endforeach

                    @if($comments_count>5)<div class="col-12 text-center"><a href="#" class="clasic-btn2">{{ __('main.see-more') }} {{ __('main.reviews') }}</a><br/><br/><br/><br/></div>
                    @else <br/><br/><br/><br/> @endif
                </div>
                <h3>{{ __('main.comment.write-your-review') }}</h3>

                {{ __('main.comment.write-your-desc') }}</br>
                
                <div class="row" x-data="$store.comments">
                    <div class="col-md-5 col-12">
                        <div class="form-group pt-3">
                            <label for="name-country">{{ __('main.comment.your-name-and-country') }}</label>
                            <input type="text" class="form-control" id="name-country" x-model="name_country">
                        </div>

                        <div class="form-group pt-3">
                            <label for="review-title">{{ __('main.comment.review-title') }}</label>
                            <input type="text" class="form-control" id="review-title" x-model="review_title">
                        </div>

                        <div class="form-group pt-3">
                            <label for="order-number">{{ __('main.comment.if-order-id') }}</label>
                            <input type="text" class="form-control" id="order-number" x-model="order_number">
                        </div>

                        <div class="form-group pt-3 pb-3">
                            <label for="points">{{ __('main.comment.star-point') }}</label>
                            <select class="form-select" x-model="points">
                                <option>Please choose an rating</option>
                                <option>5</option>
                                <option>4</option>
                                <option>3</option>
                                <option>2</option>
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                        <div class="form-group pt-3">
                            <label for="your-review">{{ __('main.comment.your-review') }}</label>
                            <textarea class="form-control" id="your-review" rows="3" x-model="your_review"></textarea>
                            <br/>
                            <div>{{ __('main.comment.by-clicking-submit') }}</div>
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <button type="submit" class="clasic-btn blue-btn" id="button" x-on:click="save">{{ __('main.submit') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var notyf = new Notyf();
        var run = 0;
        document.addEventListener('alpine:init', () => {
            Alpine.store('checkavailability', {
                loading: false,
                open: false,
                control: 0,
                pax: 1,
                dates: '{{ date('d/m/Y'); }}',
                price: {{ number_format($unit_price, 2) }},
                total_price: {{ number_format($unit_price, 2) }},
                
                date(){
                    $('#datepicker').datepicker().on('changeDate', function(e) {
                        change_date = $('#datepicker').datepicker('getFormattedDate','dd/mm/yyyy');
                        Alpine.store('checkavailability').save('',change_date);
                    });
                },
                save(e,change_date) {
                    if (typeof(change_date) != 'undefined'){
                        this.dates = change_date;
                    }

                    if(e == 'plus'){
                        if(this.pax > 14){this.pax = 15;}
                        else{this.pax = this.pax+1;}
                        document.getElementById("person").innerHTML = this.pax;
                        document.getElementById("person2").innerHTML = this.pax;
                    }
                    if(e == 'minus'){
                        if(this.pax < 2){this.pax = 1;}
                        else{this.pax = this.pax-1;}
                        document.getElementById("person").innerHTML = this.pax;
                        document.getElementById("person2").innerHTML = this.pax;
                    }

                    if(e == 'check'){
                        this.open = true;
                        document.getElementById("btns").style.display = "none";
                        $("#dropdown1").addClass("dropdownW");
                        $("#dropdown2").addClass("dropdownW");
                        $("#check").addClass("checking");

                        this.control = '1';
                        run = 1;
                    }
                    else{
                        if(this.control==1){
                            run = 1;
                        }
                    }

                    if(run==1){
                        this.loading = true;
                        $.ajax({
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            url: "/availability",
                            method: "POST",
                            data: {
                                urun_id: {{$product_id}},
                                pax: this.pax,
                                date: this.dates,
                            }
                        }).done((data) => {
                            this.loading = false;
                            this.price = data.price;
                            this.total_price = data.total_price;
                            $("#check").removeClass("checking");
                        }).fail((data) => {
                        });
                    }
                },
                cart() {
                    $.ajax({
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        url: "/cart",
                        method: "POST",
                        data: {
                            urun_id: {{$product_id}},
                            pax: this.pax,
                            date: this.dates,
                        }
                    }).done((data) => {
                        window.location.href= "/payment";
                    }).fail((data) => {
                    });
                }
            });

            Alpine.store('comments', {
                loading: false,
                name_country: '',
                review_title: '',
                order_number: '',
                your_review: '',
                points: '',

                save() {
                    this.loading = true;
                    $.ajax({
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        url: "/comments",
                        method: "POST",
                        data: {
                            urun_id: {{$product_id}},
                            siparis_id: this.order_number,
                            domain_dil: '{{app()->getLocale()}}',
                            isim: this.name_country,
                            baslik: this.review_title,
                            yorum: this.your_review,
                            puan: this.points,
                            tarih: '{{ strtotime("now") }}',
                            durum: 0,
                        }
                    }).done((data) => {
                        notyf.success({
                            message: "{{ __('main.comment.success') }}",
                            position: {y:'top'},
                            duration: 20000,
                            dismissible: true
                        });
                        document.getElementById("button").disabled = true;
                    }).fail((data) => {
                        this.loading = false;

                        notyf.error({
                            message: data.responseJSON.message,
                            position: {y:'top'},
                            duration: 20000,
                            dismissible: true
                        });
                    });
                }
            });
        });
    </script>
@endpush