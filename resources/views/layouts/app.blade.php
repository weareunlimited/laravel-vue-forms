<!--

UUUU   UUUU  NNNN    NNN  LLLL       III  MMMMM   MMMMM  III ITTTTTTTTTT EEEEEEEEEEE DDDDDDDDD
UUUU   UUUU  NNNNN   NNN  LLLL       III  MMMMM   MMMMM  III ITTTTTTTTTT EEEEEEEEEEE DDDDDDDDDDD
UUUU   UUUU  NNNNN   NNN  LLLL       III  MMMMMM  MMMMM  III ITTTTTTTTTT EEEEEEEEEEE DDDDDDDDDDD
UUUU   UUUU  NNNNNN  NNN  LLLL       III  MMMMMM MMMMMM  III     TTTT    EEEE        DDDD   DDDD
UUUU   UUUU  NNNNNNN NNN  LLLL       III  MMMMMM MMMMMM  III     TTTT    EEEEEEEEEE  DDDD    DDD
UUUU   UUUU  NNNNNNN NNN  LLLL       III  MMMMMM MMMMMM  III     TTTT    EEEEEEEEEE  DDDD    DDD
UUUU   UUUU  NNN NNNNNNN  LLLL       III  MMMMMM MMMMMM  III     TTTT    EEEEEEEEEE  DDDD    DDD
UUUU   UUUU  NNN NNNNNNN  LLLL       III  MMMMMMMMMMMMM  III     TTTT    EEEEEEEEEE  DDDD    DDD
UUUU   UUUU  NNN  NNNNNN  LLLL       III  MMM MMMMMMMMM  III     TTTT    EEEE        DDDD   DDDD
UUUUUUUUUUU  NNN  NNNNNN  LLLL       III  MMM MMMMM MMM  III     TTTT    EEEE        DDDD   DDDD
UUUUUUUUUUU  NNN   NNNNN  LLLLLLLLLL III  MMM MMMMM MMM  III     TTTT    EEEEEEEEEEE DDDDDDDDDDD
 UUUUUUUUU   NNN   NNNNN  LLLLLLLLLL III  MMM MMMMM MMM  III     TTTT    EEEEEEEEEEE DDDDDDDDDD
   UUUUU     NNN    NNNN  LLLLLLLLLL III  MMM MMMMM MMM  III     TTTT    EEEEEEEEEEE DDDDDDDDD


   SSSSSS                                                 OOOOOO
  SSSSSSSS  STTTTTTTTTT UUUU   UUUU  DDDDDDDDD    III    OOOOOOOOO
 SSSSSSSSSS STTTTTTTTTT UUUU   UUUU  DDDDDDDDDDD  III   OOOOOOOOOO
 SSSSSSSSSS STTTTTTTTTT UUUU   UUUU  DDDDDDDDDDD  III  OOOOOOOOOOOO
SSSS   SSSSS    TTTT    UUUU   UUUU  DDDD   DDDDD III  OOOO    OOOO
SSSSSS          TTTT    UUUU   UUUU  DDDD    DDDD III  OOOO    OOOOO
 SSSSSSSSS      TTTT    UUUU   UUUU  DDDD    DDDD III OOOO      OOOO
 SSSSSSSSSS     TTTT    UUUU   UUUU  DDDD    DDDD III OOOO      OOOO
   SSSSSSSSS    TTTT    UUUU   UUUU  DDDD    DDDD III OOOO      OOOO
SSSS  SSSSSS    TTTT    UUUU   UUUU  DDDD   DDDDD III  OOOO    OOOOO
SSSS    SSSS    TTTT    UUUU   UUUU  DDDD   DDDD  III  OOOO    OOOO
SSSSSSSSSSSS    TTTT    UUUUUUUUUUU  DDDDDDDDDDD  III  OOOOOOOOOOOO
 SSSSSSSSSS     TTTT    UUUUUUUUUUU  DDDDDDDDDD   III   OOOOOOOOOO
  SSSSSSSSS     TTTT     UUUUUUUUU   DDDDDDDDD    III    OOOOOOOOO
   SSSSSS                  UUUUU                          OOOOOO

Coded by Unlimited Studio – https://unlimited.studio

-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, viewport-fit=cover, initial-scale=1.0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta content="unlimited.studio" name="author" />
    <meta name="theme-color" content="#000000" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#000000" media="(prefers-color-scheme: dark)">
    
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('img/favicons/safari-pinned-tab.svg') }}" color="#fe3312">
    <link rel="shortcut icon" href="{{ asset('img/favicons/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-config" content="{{ asset('img/favicons/browserconfig.xml') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:title" content="{{ config('app.name') }} // @yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="{{ asset('img/us_meta.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ Request::url() }}">
    <meta property="twitter:title" content="{{ config('app.name') }} // @yield('title')">
    <meta property="twitter:description" content="@yield('description')">
    <meta property="twitter:image" content="{{ asset('img/us_meta.jpg') }}">

    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body>
    <div id="app">
      <!-- Main -->

      <page-header></page-header>

      <!-- Page Content -->
      @yield('content')
      <!-- Page Content END -->
      
      <page-footer></page-footer>

      <!-- Main END -->
    </div>

    <!-- Scripts  -->
    @yield('scripts')
  </body>
</html>