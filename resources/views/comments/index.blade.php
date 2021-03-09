@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Comments CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('comments.create') }}"> Create New Comment</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Content</th>
            <th width="280px">Operation</th>
        </tr>
    @foreach ($results as $rs)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $rs->content }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('comments.show', $rs->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('comments.edit', $rs->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['comments.destroy', $rs->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>
    {!! $results->render() !!}
@endsection