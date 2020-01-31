@extends('layouts.admin')
@section('content')
	@if(Session::has('prize_updated'))
		<div class="alert alert-info" role="alert">
			<strong>Information!</strong> {{session('prize_updated')}}
		</div>
	@endif
	<div class="card p-3 mb-3">
		{!! Form::model($prize, ['action'=>['AdministratorPrizesController@update', $prize->id],'method'=>'patch']) !!}
				<div class="form-group">
					<label>Name:</label>
					{!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder'=>'Draw Prize Name']) !!}
					 @error('name')
		          <span class="invalid-feedback" role="alert">
		              <strong>{{ $message }}</strong>
		          </span>
		        @enderror
				</div>
				<div class="form-group">
					<a href="{{ route('admin.prizes') }}" class="btn btn-primary">Cancel</a>
					<button type="submit" class="btn btn-success">Save changes</button>
				</div>
		{!! Form::close() !!}
	</div>
@stop