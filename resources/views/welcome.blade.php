@extends('layouts.app')
@section('title','Welcome to Editor')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-hover hover ">
                <h1 class="text-center"> Welcome To Blog Home</h1>
                <hr>
                <tbody>
                @foreach($posts as $post)
                    <tr class="trhover" onclick="location.href='{{ route('blog.single',[$post->title]) }}'">
                        <td><h4>{{ $post->title }}</h4></td>
                        <td><p>{{ substr($post->body, 0, 500)}}{{ strlen($post->body)>500 ? "............" :"" }}</p></td>
                        <td>{{ date( 'M j Y, A:h',strtotime($post->created_at)) }}</td>
                        <td>
                            <a href="{{ url('/blog/'.$post->title) }}" class="btn btn-inverse">Readmore</a>
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
