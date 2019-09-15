@extends('layouts.admin')
@section('content')

<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Add New Permissions</h6>
		</div>
		<div class="card-body">
			<form action="{{ route('roles.update',$role->id) }}" method="POST">
				@csrf
				@method('PATCH')
				<div class="form-group">
					<input type="text" name="name" class="form-control" value="{{ $role->name }}" placeholder="Enter Role Name">
					@if($errors->has('name'))
					<small class="text-danger">{{ $errors->first('name') }}</small>
					@endif
				</div>
				<div class="form-group">
					<label>Select Permissions</label>
					<select class="form-control" name="permissions[]" multiple="true">
						@foreach($permissions as $permission)
						<option value="{{ $permission->id }}"{{ $permission->roles->contains($role->id) ? 'selected' : '' }}>{{ $permission->name }}</option>
						@endforeach
					</select>
					@if($errors->has('permissions'))
					<small class="text-danger">{{ $errors->first('permissions') }}</small>
					@endif
				</div>
				<button class="btn btn-success" type="submit">Submit</button>
			</form>
		</div>
	</div>
</div>

@endsection