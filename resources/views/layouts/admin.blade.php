<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('blocks.head')
</head>
<body class="hold-transition sidebar-mini">
	<div id="app">
		@include('blocks.header')
		@include('blocks.side_header')
		@yield('content')
		<script src="{{ asset('js/main.js') }}"></script>
		@yield('scripts')
	</div>
</body>
</html>