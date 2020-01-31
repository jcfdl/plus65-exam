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
					<h4>Winners:</h4>
					@if(count($winners) > 0)
						@foreach($winners AS $data)
							<h5><strong>{{ $data->drawPrize->name }}:</strong> {{ $data->drawMember ? $data->drawMember->name : 'No winner' }}
							</h5>
							<p>Winning Number: {{ $data->number }}</p>
						@endforeach
		  		@else
						<p>Not drawn yet!</p>
		  		@endif
				</div>
			</div>
		</div>
		<div class="row main">
			<div class="main-login main-center">
				@if(Session::has('member_created'))
					<div class="alert alert-success" role="alert">
						<strong>Success!</strong> {{session('member_created')}}
					</div>
				@endif
				<h5>Fill up the form to join lucky draw!</h5>
				{!! Form::open(['action'=>'HomeController@register', 'method'=>'post', 'id'=>'reg_form']) !!}			
					<div class="form-group">
						<label for="name" class="cols-sm-2 control-label">Your Name</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-user fa" aria-hidden="true"></i></span>
								</div>
								{!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder'=>'Enter your name', 'required'=>true]) !!}
								{!! Form::hidden('draw_id', $draw->id) !!}
								{!! Form::hidden('total', null, ['id'=>'total_number']) !!}
								@error('name')
				          <span class="invalid-feedback" role="alert">
				              <strong>{{ $message }}</strong>
				          </span>
				        @enderror
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Your Winning Number 1</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-star fa" aria-hidden="true"></i></span>
								</div>
								{!! Form::number('number1', null, ['class'=>'form-control'. ($errors->has('number1') ? ' is-invalid' : ''), 'placeholder'=>'Enter winning number']) !!}
								@error('number1')
				          <span class="invalid-feedback" role="alert">
				              <strong>{{ $message }}</strong>
				          </span>
				        @enderror
							</div>
						</div>
						
					</div>
					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Your Winning Number 2</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-star fa" aria-hidden="true"></i></span>
								</div>
								{!! Form::number('number2', null, ['class'=>'form-control'. ($errors->has('number2') ? ' is-invalid' : ''), 'placeholder'=>'Enter winning number']) !!}
								@error('number2')
				          <span class="invalid-feedback" role="alert">
				              <strong>{{ $message }}</strong>
				          </span>
				        @enderror
							</div>
						</div>
						
					</div>
					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Your Winning Number 3</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-star fa" aria-hidden="true"></i></span>
								</div>
								{!! Form::number('number3', null, ['class'=>'form-control'. ($errors->has('number3') ? ' is-invalid' : ''), 'placeholder'=>'Enter winning number']) !!}
								@error('number3')
				          <span class="invalid-feedback" role="alert">
				              <strong>{{ $message }}</strong>
				          </span>
				        @enderror
							</div>
						</div>
						
					</div>
					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Your Winning Number 4</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-star fa" aria-hidden="true"></i></span>
								</div>
								{!! Form::number('number4', null, ['class'=>'form-control'. ($errors->has('number4') ? ' is-invalid' : ''), 'placeholder'=>'Enter winning number']) !!}
								@error('number4')
				          <span class="invalid-feedback" role="alert">
				              <strong>{{ $message }}</strong>
				          </span>
				        @enderror
							</div>
						</div>
						
					</div>
					<div class="form-group">
						<label for="email" class="cols-sm-2 control-label">Your Winning Number 5</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-star fa" aria-hidden="true"></i></span>
								</div>
								{!! Form::number('number5', null, ['class'=>'form-control'. ($errors->has('number5') ? ' is-invalid' : ''), 'placeholder'=>'Enter winning number']) !!}
								@error('number5')
				          <span class="invalid-feedback" role="alert">
				              <strong>{{ $message }}</strong>
				          </span>
				        @enderror
							</div>
						</div>
					
					</div>
					<div class="form-group ">
						<button type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">Join Lucky Draw!</button>
					</div>			
				{!! Form::close() !!}
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
@section('scripts')
	<script>
		$(function() {
			var inputs = $('#reg_form input[type="number"]').get();
			$('#reg_form').on('submit', function(e) {
				e.preventDefault();
				$('#reg_form .invalid-feedback').remove();
				$('#reg_form .is-invalid').removeClass('is-invalid');
				var inpArr = [];
				var ctr = 0;
				for(var i = 0; i < inputs.length; i++) {
					if($(inputs[i]).val()) {
						if(inpArr.indexOf($(inputs[i]).val()) != -1) {
							$(inputs[i]).addClass('is-invalid');
							$('<span class="invalid-feedback" role="alert"><strong>Winning number is already used! Please change!</strong></span>').insertAfter($(inputs[i]));
							return false;
						} else {
							inpArr.push($(inputs[i]).val());
							ctr++;
						}
					}
				}
				$('#total_number').val(ctr);
				$('#reg_form')[0].submit();
			});
		});
	</script>
@stop