@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Comment</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('comments.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @include('comments.alert')
    {!! Form::model($model, ['method' => 'PATCH', 'route' => ['comments.update', $model->id]]) !!}
        @include('comments.form')
    {!! Form::close() !!}
@endsection