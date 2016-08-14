@extends('layouts.app')
@section('content')
{{ Form::open(array('#', 'method'=> 'post', 'class'=> 'form-horizontal')) }}
<div class="form-group">
    <label for="file" class="col-lg-2 control-label">Uplaod Photo</label>
    <div>
        {{form::file('file',array('class'=>'text-danger'))}}
    </div>
</div>
<br>
{{ Form::submit('Submit', array('class'=>'btn btn-primary btn-sm'))}}
{{ Form::close() }}
@endsection