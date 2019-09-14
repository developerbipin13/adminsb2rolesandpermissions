@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			 <h6 class="m-0 font-weight-bold text-primary">Add New Permissions</h6>
		</div>
		<div class="card-body">
			<form action="{{ route('permissions.store') }}" method="POST">
				@csrf
				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Name of Permissions" value="{{ old('name') }}">
					@if($errors->has('name'))
					<small class="text-danger">{{ $errors->first('name') }}</small>
					@endif
				</div>
				<div class="form-group">
					<button class="btn btn-success" type="submit">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection