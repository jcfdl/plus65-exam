@extends('layouts.home')
@section('content')
	@if($draw)
		<div class="row main">
			<div class="main-login main-center main-info">
				<h1>Welcome to lucky draw!</h1>
				<h2>Draw Name: {{ $draw->name }}</h2>
				<div class="info-win mb-2">
					<h3>Did you win? Check it here!</h3>
					{!! Form::open(['action'=>'HomeController@check', 'method'=>'post']) !!}
						<div class="input-group">
							{!! Form::text('id', null, ['class'=>'form-control', 'placeholder'=>'Registration Number']) !!}
							<div class="input-group-append">
								<button type="submit" class="btn btn-info input-group-text">
									<i class="fa fa-search"></i>
								</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
				<div class="info-winners">
					@if(Session::has('member_found'))
						<div class="alert alert-success" role="alert">
							<strong>Success!</strong> {{session('member_found')}}
						</div>
					@elseif(Session::has('member_not_found'))
						<div class="alert alert-danger" role="alert">
							<strong>Warning!</strong> {{session('member_not_found')}}
						</div>
					@endif
					@if($member)
						<h5><strong>{{ $member->drawPrize->name }}:</strong> {{ $member->drawMember->name }}
						</h5>
						<p>Winning Number: {{ $member->number }}</p>
					@endif
				</div>
			</div>
		</div>
		<div class="row main">
			<div class="main-login main-center">
				<a href="/" class="btn btn-lg btn-primary">Join Lucky Draw</a>
			</div>
		</div>
	@else
		<div class="row main">
			<div class="main-login main-center main-info">
				<h1>Welcome to lucky draw!</h1>
				<h2>There is no active lucky draw as of the moment. Please come back later!</h2>
			</div>
		</div>
	@endif
@stop