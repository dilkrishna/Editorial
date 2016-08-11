@extends('layouts.app')
@section('title','Create Blog')
@section('content')
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
        <a href="{{ route('post.index') }}" class=" btn btn-default pull-right btn-sm">Back</a>
        <h1>Create Your Blog</h1>
        {{ Form::open(array('route'=> 'post.store', 'method'=> 'post', 'class'=> 'form-horizontal')) }}
        <div class="form-group">
            <label for="title" class="col-lg-2 control-label">Title</label>
            <div>
                {{ Form::text('title')}}
            </div>
        </div>
        <br>

        <div class="form-group">
            <label for="title" class="col-lg-2 control-label">body</label>
            <div>
                {{ Form::textarea('body')}}
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="col-lg-2 control-label"></label>
            <div class="col-lg-3">
                {{ Form::submit('Create', array('class'=>'btn btn-primary btn-sm'))}}
                {{ Form::reset('Reset',array('class'=>'btn btn-primary btn-sm')) }}
            </div>
        {{ Form::close() }}
    </div>
@endsection