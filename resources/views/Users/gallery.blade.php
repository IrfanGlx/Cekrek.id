@extends('layouts.gallery')
@section('title','Jepret.Id')
@section('content')
<div class="container">

  <div class="row">
    <div class="col-lg-6 offset-lg-3">
      <div class="row">
      @foreach($profile as $profil)
        <div class="col-lg-6">
          <source srcset="..." type="image/svg+xml">
            <img src="{{ asset('profiles/'.$profil->photo)}}" class="dp img-fluid img-thumbnail" alt="...">
          </picture>
        </div>
        @endforeach
        <div class="col-lg-6">
          {{ Auth::user()->name}}
          @foreach($profile as $profil)
          <p><em>{{ $profil->bio }}</em></p>
          @endforeach
          <p class="h6">Followers : {{ $followers }}</p>
          <p class="h6">Following : {{ $following }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
  @if(isset($posts))
  @foreach($posts as $post)
    <div class="col-lg-4 col-sm-6 portfolio-item wow bounce">
      <div class="card h-100">
        <a href="{{route('post', ['id' => $post->id])}}"><img class="card-img-top" src="{{ asset('upload/'.$post->file)}}" alt=""></a>
        <div class="card-body">
          <h5 class="card-title">
            {{ $post->caption }}
          </h5>
          <p class="card-text">{{ $post->description }}</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">{{ $post->created_at}}</small>
          <br>
          <form action="{{ route('deletePost') }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="idpost" value="{{$post->_id}}"> 
            <button type="submit" class="btn btn-danger float-right">Delete</button>
          </form>
          <a class="btn btn-primary float-right mr-1" href="{{route('edit', ['id' => $post->_id])}}" role="button">Edit</a>
          
        </div>
      </div>
    </div>
    @endforeach
    @endif
  </div>
  <!-- /.row -->

  <!-- Pagination -->
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>

</div>

@endsection