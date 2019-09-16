@extends('layouts.users')
@section('title','- Jepret.Id')
@section('content')
<div class="row">
	<div class="col-md-8 offset-md-2">
		<form action="{{ route('editAction')}}" method="POST" class="margintopdp">
			{{ csrf_field() }}
			@if(isset($photo))
			@foreach($photo as $post)
			<div class="form-group">
				<label for="captionPost">Caption :</label>
				<input type="text" class="form-control" id="captionPost" name="captionPost" value="{{ $post->caption }}" placeholder="Caption">
			</div>
			<div class="form-group">
				<label for="descriptionPost">Description :</label>
				<textarea class="form-control" id="descriptionPost" name="descriptionPost" rows="3">{{ $post->description }}</textarea>
			</div>
			<input type="hidden" name="idpost" value="{{$post->_id}}"> 
			@endforeach
			@endif
			<button type="submit" class="btn btn-primary">Post</button>
		</form>
	</div>
</div>
@endsection