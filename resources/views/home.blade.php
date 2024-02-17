<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restro</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- Aos CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>


    @include('_header')
<!-- Banner slider -->
<div class="bannerSection">

<div class="swiper">
    <div class="swiper-wrapper">

        <div class="swiper-slide slide1">
            <img src="{{asset('images/bannerTeaImg.jpg')}}" alt="banner1">
            <div class="content">
                <div class="tagLine">
                    <h2 class="textWhite">Sip the Moment</h2>
                    <h2 class="textWhite">Taste the Tea</h2>
                    <h2 class="textWhite">Every Tea <span>Tells a Tale</span></h2>
                </div>
            </div>
        </div>
        
        <div class="swiper-slide">
            <img src="{{asset('images/hero_bg_1_1.jpg')}}" alt="banner1">
            <div class="content">
                <div class="tagLine">
                    <h2 class="textWhite">Fast Bites, Slow</h2>
                    <h2 class="textWhite">Sips Your </h2>
                    <h2 class="textWhite">One-Stop  <span>Cafe</span></h2>
                </div>
            </div>
        </div>


        <div class="swiper-slide slide">
            <img src="{{asset('images/hero_bg_1_2.jpg')}}" alt="banner1">
            <div class="content">
                <div class="tagLine">
                    <h2 class="textWhite">Fast, Fresh, Flavorful</h2>
                    <h2 class="textWhite">Your Tea &  </h2>
                    <h2 class="textWhite">Fast Food <span>Cafe Retreat</span></h2>
                </div>
            </div>
        </div>

    </div>
</div>

</div>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{asset('js/swiperConfig.js')}}"></script>

    <!-- Aos JS -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>