<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;   
    }
    public function index()
    {
        $posts = $this->post->all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(), Post::$rules);
        
        if ($validation->fails())
        {
           return response()->json(array('success' => false, 'errors' => $validation, 'message' => 'Phải nhập đầy đủ tựa đề và nội dung.')); 
        }   
        $this->post->create($request->all());
            return response()->json(array('success' => true, 'errors' => '', 'message' => 'Thêm bài thành công.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->find($id);
        if (is_null($post))
        {
            return redirect()->route('admin.posts.index');
        }
 
        return view('admin.posts.edit', compact('post'));
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
        $input = $request->except('_method');
        $validation = \Validator::make($input, Post::$rules);
 
        if ($validation->fails())
        {
            return response()->json(array('success' => false, 'errors' => $validation, 'message' => 'Nhập đầy đủ tựa đề và nội dung'));
        }
 
            $post = Post::find($id);
            $post->update($input);
            return response()->json(array('success' => true, 'errors' => '', 'message' => 'Sửa bài thành công.'));
    }
 
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }
    
}
