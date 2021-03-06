@extends('layouts.app')
@section('content')
<!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{ $model->title }}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">Author</a>
          <a class="btn btn-primary" href="{{ url('publications') }}"> Back</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>{{ $model->created_at->format('d/m/Y') }}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">
            {{ $model->content }}
        </p>

        <hr>

        <!-- Comments Form -->
        @if (!$commentUser)
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @include('comments.alert')
            {!! Form::open(array('route' => 'comments.store', 'method' => 'POST')) !!}
                {!! Form::hidden('publication_id', $model->id) !!}
                @include('comments.form')
            {!! Form::close() !!}
          </div>
        </div>
        @endif
        
        @if ($comments)
            @foreach ($comments as $comment)
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $comment->user->name }}</h5>
                        {{ $comment->content }}
                    </div>
                </div>
            @endforeach
        @else
            <h3>sin comments</h3>>
        @endif

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Comment Like %Hola%</h5>
          <div class="card-body">
            @if ($commentLikes)
                @foreach ($commentLikes as $comment)
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $comment->user->name }}</h5>
                            {{ $comment->content }}
                        </div>
                    </div>
                @endforeach
            @else
                <h3>sin comments</h3>>
            @endif
          </div>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection