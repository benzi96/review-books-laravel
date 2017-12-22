@extends('layouts.clean')
  
@section('content')
<?php $a=glob('uploads/*.*');
?>
<div class="fix main_content floatleft">
<div class="single_page_content fix">
    @foreach (array_chunk($a,3) as $chunk)
    <div class="row" >
        @foreach ($chunk as $filename)
            <div class="col-xs-4" >
                    
                    <div class="thumb thumbnail" style="background-image: url( {{ $filename }} );">
                    </div>
                    
              
            </div>
        @endforeach
    </div>
@endforeach
    </div>
</div>
@stop