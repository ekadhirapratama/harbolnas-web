<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Hari Belanja Online Nasional (HARBOLNAS) merupakan kegiatan tahunan yang diselenggarakan bersama oleh berbagai e-commerce di Indonesia pada 12 Desember 2018 dengan dukungan dari sejumlah mitra, seperti pelaku industri telekomunikasi, perbankan, logisitik hingga media. Diselenggarakan pertama kali pada tahun 2012 melalui inisiatif dari Lazada Indonesia, Zalora, Blanja, PinkEmma, Berrybenka dan Bukalapak. Harbolnas kini telah menginjak tahun keenam, dengan lebih dari 250 e-commerce yang berpartisipasi.">
  @yield('meta')
  <title>@yield('title')</title>

  <!-- Fonts -->
  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"> --}}

  <!-- Styles -->
  <link rel="shortcut icon" href="/images/Resources/harbolnas_logo.png">
  <link rel="stylesheet" href="/css/base-app.css">
  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="/css/palette.css">
  <link rel="stylesheet" href="/css/new/css-new.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  {{-- <link rel="stylesheet" href="/css/new/font-new.css"> --}}
  <link rel="stylesheet" href="/styles/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/styles/animate.css/animate.css">
  <link rel="stylesheet" href="/styles/material-design-icons.css">
  <style>
    html {
      scroll-behavior: smooth;
    }
  </style>
  @yield('styles')
  <script type="text/javascript" src="/js/app.js"></script>

  {{-- Header --}}
  @include('partials.header')
</head>
<body>
  <div id="overlay" onclick="overlayOff()"></div>
  {{-- contents --}}
  @yield('content')

  {{-- footers --}}
  @include('partials.footer')

  {{-- scripts --}}
  <script>
    $('#login').on('click', function() {
      if ($('#form-login').is(':visible')) {
        overlayOff();
      }
      else {
        overlayOn();
      }
    });

    function overlayOn() {
      $('#overlay').show();
      $('#form-login').slideDown();
    }

    function overlayOff() {
      $('#overlay').hide();
      $('#form-login').slideUp();
    }
  </script>

  <!-- Start of harbolnas Zendesk Widget script -->
  <!-- <script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=bebce542-6005-4dcb-949a-0b4ed6deb596"> </script>
  <script>
    window.zESettings = {
      webWidget: {
        color: {
          theme: '#ff5252',
          launcherText: '#ffffff',
        }
      }
    };
  </script> -->
  <!-- End of harbolnas Zendesk Widget script -->

  @yield('scripts')
</body>
</html>
