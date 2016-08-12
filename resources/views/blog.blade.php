@extends('layouts.app')
@section('title','Welcome to Editor')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <h1>Title : {{ $post->title }}</h1>
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
    </div>
    <br><br>
    <div class="row">
        <div class="col-lg-12">
            <p class="text-justify">{{ $post->body }}</p>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
