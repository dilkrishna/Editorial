<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(10);
        return view('welcome',['posts'=>$posts]);
    }

    public function showblog($title)
    {
        $post = Post::where('title','=',$title)->first();
        return view('blog',['post'=>$post]);
    }
}
