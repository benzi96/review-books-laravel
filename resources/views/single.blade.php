@extends('layouts.clean')

@section('content')
<div class="fix main_content floatleft">
					<div class="single_page_content fix">
							<h1>{!! $post->title !!}</h1>
							<div class="single_post_meta fix">
								<p>{{{ strip_tags($post->created_at) }}}</p>
							</div>
							<div>
                                {!! $post->body !!}
                            </div>
							<a href="{{ url()->previous() }}" class="gray btn">Về trang trước</a>
							
							<div class="related_post fix">
								<h2>Bài viết liên quan</h2>
								<p>Không có đâu mà xem</p>
							</div>
						</div>
</div>
						

					
					
				
@endsection