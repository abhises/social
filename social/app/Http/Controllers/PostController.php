<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Photo;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function index()
    {
        $posts= Post::orderBy('created_at','desc')->get();
        $user=User::get();
         $album=Photo::first();
        return view('post.index')->with('posts',$posts)->with('user',$user)->with('album',$album);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'body'=>'required|max:1000'

            ]);
        $post= new Post();
        $post->body=$request['body'];
        $message='There was an error';

        if ($request->user()->posts()->save($post)) {
            $message='Post created sucessfully';
        }
        $photo=Photo::orderBy('created_at','desc')->limit(1)->get();
        return redirect()->route('post.index')->with('photo',$photo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        return view('post.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posts=Post::find($id);

        $this->validate($request,[
            'body'=>'required|max:1000'
        ]);
        $posts->body=$request->body;
        $posts->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->route('post.index');
    }
}
