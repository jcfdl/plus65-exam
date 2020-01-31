@extends('layouts.admin')
@section('content')	
	@if(Session::has('prize_created'))
		<div class="alert alert-success" role="alert">
			<strong>Success!</strong> {{session('prize_created')}}
		</div>
	@elseif(Session::has('prize_deleted'))
		<div class="alert alert-danger" role="alert">
			<strong>Warning!</strong> {{session('prize_deleted')}}
		</div>
	@endif
	<div class="card p-3 mb-3">
		<div class="mb-2">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPrize">Add Prizes</button>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name Of Prize</th>
					<th><i class="fa fa-cog"></i></th>
				</tr>
			</thead>
			<tbody>
				@if(count($prizes) > 0)
					@foreach($prizes AS $data)
						<tr>
							<td>{{ $data->id }}</td>
							<td>{{ $data->name }}</td>
							<td>
								<a href="{{ route('admin.prizes.edit', $data->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
								<a href="{{ route('admin.prizes.delete', $data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this draw prize? Confirming will permanently delete this draw prize!')"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="100">No prizes added yet</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
  <div class="modal fade" id="addPrize" tabindex="-1" role="dialog" aria-labelledby="addPrize" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Draw Prize</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      {!! Form::open(['action'=>'AdministratorPrizesController@create', 'method'=>'post']) !!}
		      <div class="modal-body">
		        <label>Name:</label>
		        {!! Form::text('name', null, ['class'=>'form-control', 'required'=>true, 'placeholder'=>'Name of prize']) !!}
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save prize</button>
		      </div>
		     {!! Form::close() !!}
	    </div>
	  </div>
	</div>
@stop