<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head> 
	@include('blocks.home_head')
</head>
<body>
	<div id="app" class="container">
		@yield('content')		
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
	@yield('scripts')
</body>
</html>