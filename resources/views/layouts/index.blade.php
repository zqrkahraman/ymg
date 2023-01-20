<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">

    <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('/assets/vendor/notyf/notyf.min.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.header')

    <main class="content">
        @yield('content')
    </main>

    @include('layouts.footer')

    <div class="overlay"></div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    @if(request()->routeIs('home')) <script src="{{ asset('assets/js/header.js') }}"></script> @endif
    <script src="{{ asset('/assets/js/slider.js') }}"></script>
    <script src="{{ asset('/assets/js/footer.js') }}"></script>
    <script src="{{ asset('/assets/vendor/alpinejs/alpinejs.min.js') }}" defer></script>
    <script src="{{ asset('/assets/vendor/notyf/notyf.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    
    <script type="text/javascript">
        function search(data){
            var value = $(data).val();
            if(value=="" || value.length<3){
                $('.search-return').css({'display':'none'});
                
            }
            else{
                $('.search-return').css({'display':'block'});

                $.ajax({
                    url: '/search',
                    dataType: 'json',
                    data: {
                        'searchTerm' : value
                    },
                    success: function(response){
                        content = "";
                        for (var x = 0; x < response.length; x++) {
                            content += '<a href="{{ LaravelLocalization::localizeUrl("/audioguides") }}/'+response[x].country_slug+'/'+response[x].city_slug+'/'+response[x].slug+'" target="_blank"><div class="container pb-2 mb-2"><div class="row"><div class="col-3 p-0"><img src="/images/product/'+response[x].images+'" width="100%"></div><div class="col-9">'+response[x].title+'</div></div></div></a>';
                        }
                        $('.search-return').html(content);
                    }
                });
            }
        }
        
        function maskot(){
            document.getElementById("maskot").style.display = "none";
            document.cookie = "maskot=true; max-age=300; path=/; secure; samesite=lax;"; // 300 saniye yani 5dk sürecek
        }
    </script>


    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "Organization",
        "url": "https://yourmobileguide.com",
        "logo": "/images/logo.svg"
        }
    </script>

    @stack('scripts')
</body>
</html>

