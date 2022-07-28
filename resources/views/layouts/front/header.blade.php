<title>
    @yield('title')
</title>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
@yield('meta')

<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
<meta name="robots" content="INDEX,FOLLOW" />

<link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Montserrat:wght@700&amp;family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
<link rel="apple-touch-icon" sizes="57x57" href="{{asset('front/assets-en/img/favicons/apple-icon-57x57.png')}}" />
<link rel="apple-touch-icon" sizes="60x60" href="{{asset('front/assets-en/img/favicons/apple-icon-60x60.png')}}" />
<link rel="apple-touch-icon" sizes="72x72" href="{{asset('front/assets-en/img/favicons/apple-icon-72x72.png')}}" />
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('front/assets-en/img/favicons/apple-icon-76x76.png')}}" />
<link rel="apple-touch-icon" sizes="114x114" href="{{asset('front/assets-en/img/favicons/apple-icon-114x114.png')}}" />
<link rel="apple-touch-icon" sizes="120x120" href="{{asset('front/assets-en/img/favicons/apple-icon-120x120.png')}}" />
<link rel="apple-touch-icon" sizes="144x144" href="{{asset('front/assets-en/img/favicons/apple-icon-144x144.png')}}" />
<link rel="apple-touch-icon" sizes="152x152" href="{{asset('front/assets-en/img/favicons/apple-icon-152x152.png')}}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('front/assets-en/img/favicons/apple-icon-180x180.png')}}" />
<link rel="icon" type="image/png" sizes="192x192" href="{{asset('front/assets-en/img/favicons/android-icon-192x192.png')}}" />
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('front/assets-en/img/favicons/favicon-32x32.png')}}" />
<link rel="icon" type="image/png" sizes="96x96" href="{{asset('front/assets-en/img/favicons/favicon-96x96.png')}}" />
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/assets-en/img/favicons/favicon-16x16.png')}}" />
<link rel="manifest" href="{{asset('front/assets-en/img/favicons/manifest.json')}}" />
<meta name="theme-color" content="#0000" />

@if(app()->getlocale() == 'ar')

<link rel="stylesheet" href="{{asset('front/assets-ar/css/app.min.css')}}" />
<link rel="stylesheet" href="{{asset('front/assets-ar/css/fontawesome.min.css')}}" />
<link rel="stylesheet" href="{{asset('front/assets-ar/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('front/assets-ar/css/styleAr.css')}}" />
<link rel="stylesheet" href="{{asset('front/assets-ar/css/theme-color1.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
@else
<link rel="stylesheet" href="{{asset('front/assets-en/css/app.min.css')}}" />
<link rel="stylesheet" href="{{asset('front/assets-en/css/fontawesome.min.css')}}" />
<link rel="stylesheet" href="{{asset('front/assets-en/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('front/assets-en/css/theme-color1.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
@endif
<link rel="stylesheet" href="{{asset('front/assets-en/css/jquery.seat-charts.css')}}" />

@yield('css')
