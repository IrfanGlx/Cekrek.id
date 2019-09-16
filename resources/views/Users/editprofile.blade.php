@extends('layouts.users')
@section('title','- Jepret.Id')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<form action="{{ route('editAction')}}" method="POST" class="margintopdp" enctype="multipart/form-data" >
			{{ csrf_field() }}
			<div class="form-group">
				<label for="bio">Bio :</label>
				<textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label for="picturePost">Profile Picture :</label>
				<input type="file" class="form-control-file" id="photo" name="photo">
			</div>
			<input type="hidden" value="{{ Auth::user()->id }}" class="form-control" name="iduser" id="iuser">
			<button type="submit" class="btn btn-primary">Post</button>
		</form>
	</div>
</div>
@endsection