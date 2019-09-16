@extends('layouts.users')
@section('title','Jepret.Id')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 margintopdp">
      @if(isset($photos))
      @foreach($photos as $photo)
      <div class="card mb-4 wow fadeInUp">
        <img class="card-img-top" src="{{ asset('upload/'.$photo->file)}}" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">{{ $photo->caption }}</h4>
          <p class="card-text">{{ $photo->description }}</p>
          <a href="{{route('post', ['id' => $photo->id])}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          {{ $photo->created_at }}
          <a href="{{route('user', ['by' => $photo->by])}}">{{ $photo->by }}</a>
        </div>
      </div>
      @endforeach
      @endif
      <ul class="pagination justify-content-center mb-4">
        <li class="page-item disabled">
          <a class="page-link" href="#">&larr; Newer</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">Older &rarr;</a>
        </li>
      </ul>
    </div>
    <div class="col-md-4">
      <div class="card my-4 position-fixed">
      <h5 class="card-header">Top Users</h5>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Followers</th>
            </tr>
          </thead>
          <tbody>
          @if(isset($listUsers))
          @foreach($listUsers as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>2001</td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
