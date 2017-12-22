@extends('admin.layouts.layouteditor')
 
@section('title', 'Sửa bài')
 
@section('main')
 
    <div class="error alert alert-danger"></div>
    <div class="success alert alert-success"></div>

    <form action="{{ route('admin.posts.update', $post->id ) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH">
        <div class="title-editable" id="post-title">{!! $post->title !!}</div>
        <div class="body-editable" id="post-body">{!! $post->body !!}</div>
        <hr class="hr">
        <h4>Ảnh bài đăng</h4>
        <div class="image-editable" id="post-image"><img src="{!! $post->image !!}"></div>
        <input type="hidden" id="post-id" value="{{ $post->id }}" />
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input class="btn btn-primary" id="form-update" type="submit" value="Sửa bài" /> 
    </form>
   
@stop