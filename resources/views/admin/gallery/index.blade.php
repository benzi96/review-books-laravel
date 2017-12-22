@extends('admin.layouts.layout')
@section('title', 'Thư viện ảnh')
@section('main')
    <h1>Thư viện ảnh</h1>
	@foreach(array_chunk(glob('uploads/*.*'),4) as $chunk)
		<div class="row">
		@foreach($chunk as $filename)
		<div class="col-md-3 col-sm-4 col-xs-4">
		<form action="{{ url('/delete') }}" method="post">
		<div class="thumbnail" style="height:260px">
		<img src="{{url('/').'/'.$filename}}" alt="{{$filename}}">
		</div>
		<input type="hidden" name="tenfile" value="{{$filename}}"/>
		<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		<input class="btn btn-danger btn-block" type="submit" name="Xoa" value="Xóa"/>
		</form>
		</div>
		@endforeach
		</div>
	@endforeach
	
@endsection