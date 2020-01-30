<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body class="hold-transition login-page">
  <div id="app">
    <div class="login-box">
      <div class="login-logo">
        <a href="/administrator"><b>Admin</b> Lucky Draw</a>
      </div>
      <div class="card">
        @yield('content')
      </div>
    </div>
  </div>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</body>
</html>
