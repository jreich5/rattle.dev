<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Exceptions\Handler;
use Log;
use Session;
use Auth;
use DB;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'edit', 'testBuilder']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $resultsPerPage = 10)
    {
        if ($request->has('search')) {
            $search = $request->input('search');
            $posts = Post::where('title', 'like', '%' . $search . '%')->orWhere('title', 'like', '%' . $search . '%')->orderBy('created_at')->paginate(10);
        } else {
            $posts = Post::orderBy('created_at')->paginate($resultsPerPage);
        }

        if (empty($search)) {
            $search = "";
        }

        $data['search'] = $search;
        $data['posts'] = $posts;

        return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Post::$rules);

        $post = new Post;
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->created_by = Auth::id();
        $post->save();

        Log::info("Post added: " . $request);

        $request->session()->flash('success', 'Post has been added!');

        return redirect()->action('PostsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        if ($post == null) {
            abort('404');
        }
        $data['post'] = $post;

        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['post'] = Post::findOrFail($id);
        return view('posts.edit')->with($data);
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
        $this->validate($request, Post::$rules);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->save();

        $request->session()->flash('success', 'Post has been updated!');

        Log::info("Post updated: " . $post);

        return redirect()->action('PostsController@show', [$id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        $request->session()->flash("success", "Post successfully deleted!");
        Log::info("Post deleted: " . $post);
        return redirect()->action('PostsController@index');
    }

}
