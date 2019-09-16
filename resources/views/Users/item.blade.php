@extends('layouts.users')
@section('title','Jepret.Id')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8">
      <h3 class="mt-4">{{ $post[0]->caption }}</h3>
      <p class="lead">
        By :
        <a href="{{ route('user', ['by' => $post[0]->by]) }}">{{ $post[0]->by }}</a>
      </p>
      <hr>
      <p>Posted on {{ $post[0]->created_at }}</p>
      <hr>
      <img class="img-fluid rounded wow bounce" src="{{ asset('upload/'.$post[0]->file) }}" alt="">

      <hr>
      <blockquote class="blockquote">
        <footer class="blockquote-footer">
          <cite title="Source Title">{{ $post[0]->description }}</cite>
        </footer>
      </blockquote>

      <hr>

      <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
          <form action="{{ route('commentaction') }}" method="POST">
          {{ csrf_field() }}
            <div class="form-group">
              <textarea class="form-control" rows="3" name="commentPost"></textarea>
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" value="{{ $post[0]->id }}" name="idPost">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>

      <!-- Single Comment -->
      @if(isset($comment))
      @foreach($comment as $komen)
      <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">{{ $komen->user->name }}</h5>
          {{ $komen->comment }}
        </div>
      </div>
    @endforeach
    @endif
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
            @if(isset($user))
            @foreach($user as $top)
            <tr>
              <td>{{ $top->name }}</td>
              <td>2001</td>
            </tr>
            @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>

  </div>
  <!-- /.row -->

</div>
@endsection