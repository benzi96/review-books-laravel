<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class IndexController extends Controller
{
    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->paginate(8);
        return view('index', compact('posts'));
    }
    
    public function show($id)
    {
        $post = $this->post->findOrFail($id);
        return view('single', compact('post'));
    }
    public function search(Request $request)
    {
        $posts = Post::where('title', 'LIKE', '%'.$request->search.'%')->paginate(8);
        return view('search', compact('posts'));
    }

}
