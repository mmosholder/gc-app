<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="application-name" content="{{ config('app.name', 'Laravel') }}">

    <meta name="description" content="">

    <!-- For IE 10 and below -->
    <!-- Place favicon.ico in the root directory - no tag necessary -->

    <!-- For IE 11, Chrome, Firefox, Safari, Opera -->
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
    <link rel="icon" type="image/png" href="/images/32x32-favicon.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/images/16x16-favicon.png" sizes="16x16" />

    <!-- Add to Home Screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="App Title">

    <!-- Touch Icons -->
    <!-- In most cases, one 180×180px touch icon in the head is enough -->
    <link rel="apple-touch-icon" href="/images/180x180-app-icon.png">

    <meta name="theme-color" content="#B1CE70">

    <!-- Add to home screen -->
    <meta name="mobile-web-app-capable" content="yes">
    <!-- More info: https://developer.chrome.com/multidevice/android/installtohomescreen -->

    <!-- Define your web page as a web app -->
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Homescreen Icon  -->
    <link rel="icon" sizes="192x192" href="/images/192x192-app-icon.png">

    <!-- IE10: Disable link highlighting upon tap (https://blogs.windows.com/buildingapps/2012/11/15/adapting-your-webkit-optimized-site-for-internet-explorer-10/) -->
    <meta name="msapplication-tap-highlight" content="no">

    <meta name="application-name" content="{{ config('app.name', 'Laravel') }}">
    <meta name="msapplication-tooltip" content="">
    <meta name="msapplication-starturl" content="http://example.com/index.html?pinned=true">
    <meta name="msapplication-navbutton-color" content="#B1CE70">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    <app></app>
  </div>
  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
