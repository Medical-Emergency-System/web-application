<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Medical Emergency System</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/favicon.ico')}}" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css')}} ">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="{{ asset('plugins/icofont/icofont.min.css')}} ">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick.css')}} ">
  <link rel="stylesheet" href="{{ asset('plugins/slick-carousel/slick/slick-theme.css')}} ">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('css/style.css')}} ">
  <!-- for the PWA -->
  <link rel="manifest" href="{{ asset('js/manifest.json')}} ">
  <script src="{{ asset('js/active.js')}}"></script>
  <script src="https://www.gstatic.com/firebasejs/8.0.2/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.0.1/firebase-messaging.js"></script>
  <link rel="manifest" href="/manifest.json">
</head>

<body id="top">
@include('Layout.Header')
@yield('content')

@include('Layout.Footer')

    <!--
    Essential Scripts
    =====================================-->


    <!-- Main jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.js')}}"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="{{ asset('plugins/bootstrap/js/popper.js')}}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('plugins/counterup/jquery.easing.js')}}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('plugins/slick-carousel/slick/slick.min.js')}}"></script>
    <!-- Counterup -->
    <script src="{{ asset('plugins/counterup/jquery.waypoints.min.js')}}"></script>

    <script src="{{ asset('plugins/shuffle/shuffle.min.js')}}"></script>
    <script src="{{ asset('plugins/counterup/jquery.counterup.min.js')}}"></script>
    <!-- Google Map -->
    {{-- <script src="{{ asset('plugins/google-map/map.js')}}"></script> --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initialize" async defer></script>
    <script src="{{asset('js/mapInput.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
    <script src="{{ asset('js/contact.js')}}"></script>
    <script src="{{ asset('js/active.js')}}"></script>
    <script>

      var firebaseConfig = {
          apiKey: "",
          authDomain: "",
          projectId: "",
          storageBucket: "",
          messagingSenderId: "",
          appId: "",
          measurementId: ""
      };
      firebase.initializeApp(firebaseConfig);
      const messagingApp = firebase.messaging();
      console.log(messagingApp.getToken());
      messagingApp.requestPermission()
              .then(function(){
                  return messagingApp.getToken();
              }).then(function(tokenApp){
                  console.log(tokenApp);
              }).catch(function(err){
                  console.log('error ',err);
              })
  </script>
    @yield('js')
  </body>
  </html>
