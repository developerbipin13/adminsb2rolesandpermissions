@extends('layouts.admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-5 profile-img">
			@foreach($user->getMedia('profile_img') as $media)
			<img src="{{ asset($media->getUrl()) }}" class="img-thumbnail">
			@endforeach
			<div class="caption">
				<form action="{{ route('profiles.change_avatar',$user->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<input type="file" name="profile_img" class="form-control">
					<button type="submit" class="btn btn-secondary btn-block">Upload Picture</button>
				</form>
			</div>
		</div>
		<div class="col-md-7 user-details">
			<form action="{{ route('profiles.edit',$user->id) }}" method="POST">
				@csrf
				@method('PATCH')
				<div class="form-group">
					<label>First Name:</label>
					<input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">
				</div>
				<div class="form-group">
					<label>Last Name:</label>
					<input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" value="{{ $user->email }}">
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				   <select class="form-control" name="country_id">
				   	<option selected disabled>Country</option>
				   	@foreach($countries as $country)
				   	<option value="{{ $country->id }}"@if($user->country_id == $country->id) selected @endif>{{ $country->name }} (+{{ $country->phonecode }})</option>
				   	@endforeach
				   </select>
				  </div>
				  <input type="text" class="form-control" aria-label="Text input with dropdown button" value="{{ $user->phone }}" name="phone">
				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" name="address" value="{{ $user->address }}" class="form-control">
				</div>
				<button type="submit" class="btn btn-success btn-block">Edit Profile</button>
			</form>
		</div>	
	</div>
	<br><br>
	<div class="row">
		<div class="col-md-3">
			<form action="{{ route('profiles.collection',$user->id) }}" method="POST" enctype="multipart/form-data">
				@csrf
				<input type="file" name="collection" class="form-control">
				<button class="btn btn-info btn-block">Add to Collection</button>
			</form>
		</div>
		<div class="col-md-3">
			<div class="upload-btn-wrapper">
				<form action="{{ route('profiles.delete',$user->id) }}" method="POST">
					@csrf
					@method('DELETE')
					<button class="btn btn-danger btn-block">Delete All Collection</button>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		@foreach(Auth::user()->getMedia('collection') as $media)
		<div class="col-md-4 img-collection">
			<img src="{{ asset($media->getUrl()) }}" class="img-thumbnail">
		</div>
		@endforeach
	</div>
</div>

@endsection