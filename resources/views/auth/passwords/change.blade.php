@extends('layouts.admin')
@section('content')

<div class="container">
	<form action="{{ route('password.change') }}" method="POST">
		@csrf
		<div class="form-group">
			<label>Current Password</label>
			<input type="password" name="old_password" placeholder="Current Password" class="form-control">
			@if($errors->has('old_password'))
			<small class="text-danger">{{ $errors->first('old_password') }}</small>
			@endif
		</div>
		<div class="form-group">
			<label>New Password</label>
			<input type="password" name="password" placeholder="Current Password" class="form-control">
			@if($errors->has('password'))
			<small class="text-danger">{{ $errors->first('password') }}</small>
			@endif
		</div>
		<div class="form-group">
			<label>New Password</label>
			<input type="password" name="password_confirmation" placeholder="Current Password" class="form-control">
			@if($errors->has('password_confirmation'))
			<small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
			@endif
		</div>
		<button type="submit" class="btn btn-success btn-block">Change Password</button>
	</form>
</div>

@endsection