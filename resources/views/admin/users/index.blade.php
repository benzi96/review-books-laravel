@extends('admin.layouts.layout')
 
@section('title', 'Thành viên')
 
@section('main')
 
<h1>Thành viên</h1>
  
@if ($users->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên thành viên</th>
                <th>E-Mail</th>
                <th>Quyền</th>
                <th></th>
            </tr>
        </thead>
 
        <tbody>
            @foreach ($users as $user)
                <tr>
                        <td style="width: 200px;">{{{ strip_tags($user->id) }}}</td>
                        <td>{{{ strip_tags($user->name) }}}</td>
                        <td>{{{ strip_tags($user->email) }}}</td>
                        <td>
                            @if ($user->admin == 1)
                            Admin
                            @else
                            Thành viên thường
                            @endif
                        </td>
                        <td>
                            @if ($user->admin == 1)
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" id="user-admin" name="admin" value="0" />
                                <input type="hidden" id="user-id" value="{{ $user->id }}" />
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input class="btn btn-danger" type="submit" value="Xóa quyền admin">
                            </form>
                            @else
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" id="user-admin" name="admin" value="1" />
                                <input type="hidden" id="user-id" value="{{ $user->id }}" />
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                <input class="btn btn-info" type="submit" value="Thêm quyền admin">
                            </form>
                            @endif
                        </td>
                        <td>
                            
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
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
    Không có thành viên
@endif
 
@stop