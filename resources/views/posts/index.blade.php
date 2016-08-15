@extends('layouts.app')
@section('title','Posts')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong> Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-10">
            <h1> All the posts</h1>
        </div>
        <div class="col-lg-2">
            <a href="{{ route('post.create') }}" class="btn btn-primary btn-h1-margin"> Create Post</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-hover hover ">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th>Action</th>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr class="trhover" onclick="location.href='{{ route('post.show',[$post->id]) }}'">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr($post->body, 0, 50)}}{{ strlen($post->body)>50 ? "............" :"" }}</td>
                        <td>{{ date( 'M j Y, A:h',strtotime($post->created_at)) }}</td>
                        <td>
                            <a href="{{ route('post.show',[$post->id]) }}" class="btn btn-inverse">View</a>
                            <a href="{{ route('post.edit',[$post->id]) }}" class="btn btn-inverse">Edit</a>
                        </td>
                        <td>
                            {!! Form::model($post, ['method' => 'DELETE','route' => ['post.update', $post->id]]) !!}
                            {{ Form::submit('Delete', array('class'=>'btn btn-danger btn-sm'))}}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-right">
              {{ $posts->links()}}
            </div>
        </div>
      </div>
@endsection
