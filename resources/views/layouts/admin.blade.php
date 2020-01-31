<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('blocks.head')
</head>
<body class="hold-transition sidebar-mini">
	<div id="app" class="wrapper">
		@include('blocks.header')
		@include('blocks.side_header')
  	<div class="content-wrapper">
  		@include('blocks.section_title')
  		<section class="content">
	  		<div class="container-fluid">
	  			<div class="row">
	  				<div class="col-12">
							@yield('content')
	  				</div>
	  			</div>
	  		</div>
	  	</section>
		</div>
		@include('blocks.footer')
		<script src="{{ asset('js/main.js') }}"></script>
		@yield('scripts')
	</div>
</body>
</html>