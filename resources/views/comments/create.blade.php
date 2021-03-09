@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Comment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('comments.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @include('comments.alert')
    {!! Form::open(array('route' => 'comments.store', 'method' => 'POST')) !!}
         @include('comments.form')
    {!! Form::close() !!}
@endsection