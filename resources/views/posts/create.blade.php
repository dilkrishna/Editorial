@extends('layouts.app')
@section('title','Create Blog')
@section('content')
    <a href="{{ route('post.index') }}" class=" btn btn-default pull-right btn-sm">Back</a>
    <div row>
        <div class="col-lg-12">
                <div>
                    {{--@if (count($errors) > 0)--}}
                        {{--<div class="text-danger" role="alert" >--}}
                            {{--<strong> Errors:</strong>--}}
                            {{--<ul>--}}
                                {{--@foreach ($errors->all() as $error)--}}
                                    {{--<li>{{ $error }}</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                </div>
                <h1>Create Your Blog</h1>
                {{ Form::open(array('route'=> 'post.store', 'method'=> 'post', 'class'=> 'form-horizontal', 'files'=>'true', 'enctype'=>"multipart/form-data")) }}
                <div class="col-lg-12">
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} ">
                        <label for="title" class="col-lg-2 control-label"><h1>Title :</h1></label>
                        <div>
                            <h1><input id="title" type="text"  name="title" value="{{ Input::get('title') }}"></h1>
                        </div>
                        @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>
                                    <li>{{ $errors->first('title') }}</li>
                                </strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group" {{ $errors->has('file') ? ' has-error' : '' }}>
                    <label for="file" class="col-lg-2 control-label">Uplaod Photo</label>
                    <div>
                        {{form::file('file',array('class'=>'text-danger'))}}
                    </div>
                    @if ($errors->has('file'))
                        <span class="help-block">
                            <strong>
                                <li>{{ $errors->first('file') }}</li>
                            </strong>
                        </span>
                    @endif
                </div>
                <br>
                <div class="form-group  {{ $errors->has('body') ? ' has-error' : '' }}">
                    <label for="body" class="col-lg-2 control-label"><h1>Body:</h1></label>
                    <div>
                        {{ Form::textarea('body')}}
                    </div>
                    @if ($errors->has('body'))
                        <span class="help-block">
                            <strong>
                                <li>{{ $errors->first('body') }}</li>
                            </strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="title" class="col-lg-2 control-label"></label>
                    <div class="col-lg-3">
                        {{ Form::submit('Create', array('class'=>'btn btn-primary btn-sm'))}}
                        {{ Form::reset('Reset',array('class'=>'btn btn-primary btn-sm')) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection