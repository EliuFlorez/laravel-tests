@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h2>Edit Publication</h2>
                        </div>
                        <div class="col-6 pull-right">
                            <a class="btn btn-primary" href="{{ url('publications') }}"> Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('publications.alert')
                    {!! Form::model($model, ['method' => 'PUT', 'route' => ['publications.update', $model->id]]) !!}
                        @include('publications.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection