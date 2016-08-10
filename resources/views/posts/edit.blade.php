@extends('layouts.app')
@section('title','Blog Edit')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong> Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
    <div>
        @if (count($errors) > 0)
            <div class="text-danger" role="alert" >
                <strong> Errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div>
        @if (count($errors) > 0)
            <div class="text-danger" role="alert" >
                <strong> Errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="row">
        {!! Form::model($post, ['method' => 'PUT', 'route' => ['post.update', $post->id]]) !!}
{{--        {{ Form::open(array('method' => 'PUT', 'route' => array('post.update', $post->id))) }}--}}
            <div class="col-lg-8">
                {{ Form::label('title', 'Title',["class"=>"input-lg"]) }}
                {{ Form::text('title', null  ,["class" => "form-control input-lg"]) }}
            </div>
            <div class="col-lg-4">
                <div>
                    <dl class="dl-horizontal">
                        <dt class="text-success">Created At :</dt>
                        <dl class="text-info">{{ date('M j ,Y h:i A',strtotime($post->created_at)) }}</dl>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt class="text-success">Updated At :</dt>
                        <dl class="text-info">{{ date('M j ,Y h:i A',strtotime($post->updated_at)) }}</dl>
                    </dl>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12">
                {{ Form::label('body', 'Body',["class"=>"input-lg"]) }}
                {{ Form::textarea('body', null  ,["class" => "form-control"]) }}
            </div>
            {!! Form::submit('Update', array('class'=>'btn btn-primary pull-right btn-h1-margin'))!!}
                <a href="{{ route('post.index',[$post->id]) }}" class="btn btn-default pull-right btn-h1-margin">Cancel</a>
        {!! Form::close()  !!}
    </div>
@endsection