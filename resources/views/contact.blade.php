@extends('layouts.clean')

@section('content')
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>

		<script>
		function initialize()
		{
		var mapProp = {
		  center:new google.maps.LatLng(51.508742,-0.120850),
		  zoom:5,
		  mapTypeId:google.maps.MapTypeId.ROADMAP
		  };
		var map=new google.maps.Map(document.getElementById("googleMap")
		  ,mapProp);
		}

		google.maps.event.addDomListener(window, 'load', initialize);
        </script>
					<div class="fix main_content floatleft">
						<div class="fix main_content floatleft">
						<div class="single_page_content fix">
							<h1 style="margin-bottom:15px;">Liên lạc</h1>
							
							<div class="google_map">
								<div id="googleMap"></div>
								<div class="contact_info">
									<p>Trụ sở của chúng tôi ở trên mây, hay còn gọi là cloud island</p>
								</div>
							</div>
						</div>
					</div>
					</div>
					
				
@endsection