@extends('layouts.clean')

@section('content')
@if ($posts->count())
<p>Tìm thấy {{ $posts->count() }} bài đăng</p>
					<div class="fix main_content floatleft">
						<div class="fix single_content_wrapper">
                             @foreach ($posts->getCollection()->all() as $post)
                            <div class="fix single_content floatleft">
                                <a href="{{ url('/post', $post->id) }}">
                                    <img src="{{$post->image}}" alt="{{{ strip_tags($post->title) }}}"/>
                                </a> 
							     <div class="fix single_content_info">
								    <a href="{{ url('/post', $post->id) }}">
                                        <h1>{{{ strip_tags($post->title) }}}</h1>
                                    </a>
								    <p class="author">Viết bởi adminpage</p>
								    <p>{{{ str_limit(strip_tags($post->body),30) }}}</p>
								    <div class="fix post-meta">
									<p>{{{ strip_tags($post->created_at) }}}</p>
								    </div>
							 </div>
							
						</div>
                             @endforeach
                        </div>
						
						<div class="pagination fix">
							{{$posts->render()}}
						</div>
					</div>
@else
Tìm không thấy
@endif
					
				
@endsection