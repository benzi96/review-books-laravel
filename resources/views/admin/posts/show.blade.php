@extends('admin.layouts.layouteditor')
 
@section('title', 'View Post')
 
@section('main')
 
    <p><a href="{{ route('admin.posts.index') }}">Trở về tất cả bài đăng</a></p>

    <div id="hideEditor" style="display:none;"></div>
    <div id="post-title" class="title-editable">{!! $post->title !!}</div>
    <div id="post-body" class="body-editable">{!! $post->body !!}</div>
    <hr class="hr">
    <h4>Ảnh bài đăng</h4>
    <div class="image-editable" id="post-image"><img scr="{!! $post->image !!}"></div>
@stop