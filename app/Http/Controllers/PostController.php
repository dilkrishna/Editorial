<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Post;
use Session;

class PostController extends Controller
{
    public function index()
        {
//            return 'index';
            $posts = Post::orderBy('id','desc')->paginate(10);

            return view('posts.index',['posts'=>$posts]);
        }

    public function create()
        {
            return view('posts.create');
        }

    public function store(Request $request)
        {
//            return 'store';
        // validation
        $validator = Validator::make($request->all(),[
            'title' => 'required|unique:posts',
            'body' => 'required',
            'file' => 'required|mimes:jpeg,bmp,png,jpg|',
        ]);

        if($validator->fails()){
//            return redirect()->route('post.create',['errors'=>$validator->errors()]);
            return view('posts.create', ['errors'=>$validator->errors()]);
        }
        else{
//             insert into database
            $post = new Post;
            $post->title  =  $request->title;
            $post->body   =  $request->body;
            $post->file   =  $request->file;

            $post->save();

            Session::flash('success', 'The blog is successfully save !');

            return redirect()->route('post.show',[$post->id]);
        }


    }

    public function show($id)
        {
//            return 'show';
            $post = Post::find($id);
            return view('posts.show',['post'=>$post]);
        }

    public function edit($id)
        {
//            return 'edit';
            $post = Post::find($id);
            return view('posts.edit',['post'=>$post]);
        }

    public function update(Request $request,$id)
        {
//         return 'update';
         // validation
            $validator = Validator::make($request->all(),[
                'title' => 'required',
                'body' => 'required',
            ]);
//            $data = [ $id ,['errors'=> $validator->errors()]];

            if($validator->fails()){
                return redirect()->route(['post.edit','errors'=>$validator->errors()]);
//                return view('posts.edit', [$id,'errors'=>$validator->errors()]);
            }
            // insert into database
            $post = Post::find($id);
            $post->title  =  $request->input('title');
            $post->body   =  $request->input('body');

            $post->save();

            Session::flash('success', 'The blog is successfully updated !');

            return redirect()->route('post.show',[$request->id]);

        }


    public function destroy($id)
        {
//   return 'destroy';
        $post =Post::findOrfail($id);
        $post->delete();

        Session::flash('success', 'The blog is deleted!');
            return redirect()->route('post.index');
        }
}
