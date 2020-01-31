@extends('layouts.admin')
@section('content')
	@if(Session::has('draw_created'))
		<div class="alert alert-success" role="alert">
			<strong>Success!</strong> {{session('draw_created')}}
		</div>
	@elseif(Session::has('draw_maked'))
		<div class="alert alert-info" role="alert">
			<strong>Information!</strong> {{session('draw_maked')}}
		</div>
	@endif
  <div class="card p-3 mb-3">
  	<div class="mb-2">
	  	@if($draw)
				<a href="#" class="btn btn-danger"><i class="fas fa-check"></i> Finish Lucky Draw</a>
	  	@else	  	
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDraw"><i class="fas fa-star"></i> Start Lucky Draw</button>
	  	@endif
	  </div>
	  <h4>Draw Name: {{ $draw->name }}</h4>
	  <h4>Draw Winners</h4>
	  {!! Form::open(['action'=>'AdministratorsController@draw', 'method'=>'post']) !!}
			<div class="form-group">
				<label>Draw Prize:</label>
				{!! Form::select('draw_prize_id', [''=>'Select draw prize'] + $prizes, null, ['class'=>'form-control w-25', 'required'=>true]) !!}
			</div>
			<div class="form-group">
				<label>Generate Number:</label>
				{!! Form::select('gen_number', [1=>'Yes', 2=>'No'], old('gen_number'), ['class'=>'form-control w-25', 'id'=>'generate_number']) !!}
			</div>
			<div class="form-group">
				<label>Winning Number:</label>
				{!! Form::number('number', null, ['class'=>'form-control w-25' . ($errors->has('number') ? ' is-invalid' : ''), 'id'=>'form_number', 'placeholder'=>'Enter winning number', 'disabled'=>true, 'required'=>false, 'min'=>1000, 'max'=>9999]) !!}
				{!! Form::hidden('draw_id', $draw->id) !!}
				@error('number')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
			</div>
			<div class="form-group">
				{!! Form::submit('Draw', ['class'=>'btn btn-info']) !!}
			</div>
	  {!! Form::close() !!}
	  <h4>Winners</h4>
	  <table class="table table-bordered">
	  	<thead>
	  		<tr>
	  			<th>Name</th>
	  			<th>Prize</th>
	  			<th>Winning Number</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		@if(count($winners) > 0)
					@foreach($winners AS $data)
						<tr>
							<td>{{ $data->drawMember ? $data->drawMember->name : 'No winner' }}</td>
							<td>{{ $data->drawPrize->name }}</td>
							<td>{{ $data->number }}</td>
						</tr>
					@endforeach
	  		@else
					<tr>
						<td colspan="100">No winners yet</td>
					</tr>
	  		@endif
	  	</tbody>
	  </table>
  </div>
  @if(!$draw)
	  <div class="modal fade" id="addDraw" tabindex="-1" role="dialog" aria-labelledby="addDraw" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Add Lucky Draw</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      {!! Form::open(['action'=>'AdministratorsController@create', 'method'=>'post']) !!}
			      <div class="modal-body">
			        <label>Name:</label>
			        {!! Form::text('name', null, ['class'=>'form-control', 'required'=>true, 'placeholder'=>'Name of lucky draw']) !!}
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save draw</button>
			      </div>
			     {!! Form::close() !!}
		    </div>
		  </div>
		</div>
	@endif
@stop
@section('scripts')
	<script>		
		$(function() {
			var number  = $('#generate_number').val();
			if(number == 1) {
					$('#form_number').prop('disabled', true);
					$('#form_number').prop('required', false);
				} else {
					$('#form_number').prop('disabled', false);
					$('#form_number').prop('required', true);
				}
			$('#generate_number').on('change', function() {
				var val = $(this).val();
				if(val == 1) {
					$('#form_number').prop('disabled', true);
					$('#form_number').prop('required', false);
				} else {
					$('#form_number').prop('disabled', false);
					$('#form_number').prop('required', true);
				}
			})
		})
	</script>
@stop