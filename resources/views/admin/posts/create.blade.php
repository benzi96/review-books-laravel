@extends('admin.layouts.layouteditor')
 
@section('title', 'Tạo bài đăng')
 
@section('main')
 
    <div class="error alert alert-danger"></div>
    <div class="success alert alert-success"></div>

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        <div class="title-editable" id="post-title"><h1>Enter post title</h1></div>
        <div class="body-editable" id="post-body"><p>Enter post body</p></div>
        <hr class="hr">
        <h4>Ảnh bài đăng</h4>
        <div class="image-editable" id="post-image"></div>
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input class="btn btn-primary" id="form-submit" type="submit" value="Lưu bài">
    </form>
 
@stop