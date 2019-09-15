@extends('layouts.admin')
@section('content')

<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Add New Permissions</h6>
		</div>
		<div class="card-body">
			<form action="{{ route('users.store') }}" method="POST">
				@csrf
				<div class="form-group">
					<input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="Enter First Name">
					@if($errors->has('first_name'))
					<small class="text-danger">{{ $errors->first('first_name') }}</small>
					@endif
				</div>
				<div class="form-group">
					<input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" placeholder="Enter Last Name">
					@if($errors->has('last_name'))
					<small class="text-danger">{{ $errors->first('last_name') }}</small>
					@endif
				</div>
				<div class="form-group">
					<input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Email">
					@if($errors->has('email'))
					<small class="text-danger">{{ $errors->first('email') }}</small>
					@endif
				</div>
				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Enter a password">
					@if($errors->has('password'))
					<small class="text-danger">{{ $errors->first('password') }}</small>
					@endif
				</div>
				<div class="form-group">
					<label>Select Roles</label>
					<select class="form-control" name="roles[]" multiple="true">
						@foreach($roles as $role)
						<option value="{{ $role->id }}">{{ $role->name }}</option>
						@endforeach
					</select>
					@if($errors->has('roles'))
					<small class="text-danger">{{ $errors->first('roles') }}</small>
					@endif
				</div>
				<button class="btn btn-success" type="submit">Submit</button>
			</form>
		</div>
	</div>
</div>

@endsection