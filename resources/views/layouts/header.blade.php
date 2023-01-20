<div class="{{ request()->routeIs('home') ? 'home' : '' }}" id="home">
    <nav class="navbar navbar-expand-lg bg-white" id="navbar_top">
        <div class="container">
            <a class="navbar-brand" id="navbar-brand" href="{{ LaravelLocalization::localizeUrl('/') }}">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>
            <div class="collapse navbar-collapse justify-content-end pt-4 pt-lg-0 text-center" id="navbarSupportedContent">
                <form class="d-flex mb-4 mb-lg-0 search" role="search">
                    <input class="form-control" onkeyup="search(this);" placeholder="Berlin Audio Guide.." aria-label="Search">
                    <div class="search-return p-3"></div>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0 ms-xl-5 ms-lg-4">
                    <li class="nav-item h-btn">
                        <a class="nav-link px-3" href="{{ LaravelLocalization::localizeUrl('/audioguides') }}">City Maps & Audio Guides</a>
                    </li>
                        
                    @if(!request()->routeIs('user-information') && !request()->routeIs('payment-detail') && !request()->routeIs('completed'))
                    <li class="nav-item h-btn dropdown">
                        <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('main.language') }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @php
                                    $route = request()->route()->getName();
                                    $url = route('home');
                            
                                    if ($route == 'shop') {
                                        $url = route('shop');
                                    }
                                    
                                    if ($route == 'category') {
                                        if (isset($country_slug) && isset($country_slug[$localeCode])) {
                                            $url = route('category', $country_slug[$localeCode]);
                                        }
                                    }
                                    
                                    if ($route == 'sub-category') {
                                        if (isset($city_slug) && isset($city_slug[$localeCode])) {
                                            $url = route('sub-category', [
                                                'country' => $country_slug[$localeCode],
                                                'city' => $city_slug[$localeCode]
                                            ]);
                                        }
                                    }
                            
                                    if ($route == 'product') {
                                        if (isset($product_slug) && isset($product_slug->$localeCode)) {
                                            $url = route('product', [
                                                'country' => $country_slug[$localeCode],
                                                'city' => $city_slug[$localeCode],
                                                'product' => $product_slug->$localeCode
                                            ]);
                                        }
                                    }

                                    if ($route == 'info') {
                                        if (isset($slug) && isset($slug[$localeCode])) {
                                            $url = route('info', [
                                                'page' => $slug[$localeCode],
                                            ]);
                                        }
                                    }
                                @endphp
                                <li>
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, $url, [], true) }}">
                                        <img src="/images/language/{{ $localeCode }}.svg" width="15" class="me-2 language">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    {{-- <li class="nav-item h-btn dropdown">
                        <a class="nav-link dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-euro-sign"></i> 
                            EUR
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item px-3" href="#">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                    USD
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</div>