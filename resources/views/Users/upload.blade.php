@extends('layouts.users')
@section('title','- Jepret.Id')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<form action="{{ route('uploadaction')}}" method="POST" class="margintopdp" enctype="multipart/form-data" >
			{{ csrf_field() }}
			<div class="form-group">
				<label for="captionPost">Caption :</label>
				<input type="text" class="form-control" id="captionPost" name="captionPost" placeholder="Caption">
			</div>
			<div class="form-group">
				<label for="descriptionPost">Description :</label>
				<textarea class="form-control" id="descriptionPost" name="descriptionPost" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label for="picturePost">Picture :</label>
				<input type="file" class="form-control-file" id="picturePost" name="picturePost">
			</div>
			<button type="submit" class="btn btn-primary">Post</button>
		</form>
	</div>
</div>
@endsection