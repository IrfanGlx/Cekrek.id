@extends('layouts.gallery')
@section('title','Jepret.Id')
@section('content')
<div class="container">

  <div class="row">
    <div class="col-lg-6 offset-lg-3">
      <div class="row">
        <div class="col-lg-6">
          <source srcset="..." type="image/svg+xml">
          @foreach($profile as $propil)
            <img src="{{ asset('profiles/'.$propil->photo)}}" class="dp img-fluid img-thumbnail" alt="...">
            @endforeach
          </picture>
        </div>
        <div class="col-lg-6">
          @foreach($akun as $propil)
          {{ $propil->name }}
          <p><em>{{ $propil->bio }}</em></p>
          @endforeach
          <p class="h6">Followers : {{ $followers }}</p>
          <p class="h6">Following : {{ $following }}</p>
          <form action="{{ route('followAction') }}" method="POST">
            {{ csrf_field() }}
            @if(isset($nama))
            @foreach($nama as $profile)
            <div class="form-group">
              <input type="hidden" class="form-control" value="{{ $profile->email }}" name="following">
            </div>
            @endforeach
            @endif
            <button type="submit" class="btn btn-primary">Follow</button>
          </form>
          <form action="{{ route('unfollowAction') }}" method="POST">
            {{ csrf_field() }}
            @if(isset($nama))
            @foreach($nama as $profile)
            <div class="form-group">
              <input type="hidden" class="form-control" value="{{ $profile->email }}" name="following">
            </div>
            @endforeach
            @endif
            <button type="submit" class="btn btn-danger">Unfollow</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    @if(isset($photo))
    @foreach($photo as $post)
    <div class="col-lg-4 col-sm-6 portfolio-item wow fadeInUp">
      <div class="card h-100">
        <a href="{{route('post', ['id' => $post->_id])}}"><img class="card-img-top" src="{{ asset('upload/'.$post->file)}}" alt=""></a>
        <div class="card-body">
          <h5 class="card-title">
            {{ $post->caption }}
          </h5>
          <p class="card-text">{{ $post->description }}</p>
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