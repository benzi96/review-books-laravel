@extends('admin.layouts.layout')
 
@section('title', 'Bài đăng')
 
@section('main')
 
<h1>Tất cả bài đăng</h1>
 
<p class="font1"><a href="{{ route('admin.posts.create') }}">Thêm bài đăng mới</a></p>
 
@if ($posts->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tựa đề</th>
                <th>Ngày đăng</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
 
        <tbody>
            @foreach ($posts as $post)
                <tr>
                        <td style="width: 200px;">{{{ strip_tags($post->title) }}}</td>
                        <td>{{{ strip_tags($post->created_at) }}}</td>
                        <td><a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info">Xem</a> </td>
                        <td><a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-info">Sửa</a></td>
                        <td>
                            
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" enctype="multipart/form-data">
                                 <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input class="btn btn-danger" type="submit" value="Xóa">
                            </form>
                                            
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    Không có bài đăng
@endif
 
@stop