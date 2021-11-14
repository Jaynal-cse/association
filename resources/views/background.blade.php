

@extends('layouts.frontend.app')

@section('title','CricExtra')

@push('css')
<style>
 .col-md-5   {
   
   
    padding-left: 0px;
}
.SidePadding {
    padding: 10px 16px;
}
 .col-md-7  {
   
    
    padding-right: 0px;
}
p {
   
    color: gray;
    font-family: robotoo;
}


.col-md-5 ul {
  list-style-type: none;
 margin-top:45px;
 margin-left:20px;
 padding-right:12px;
  background-color: #fff;
}

.col-md-5 li a {
  display: block;
  color: gray;
  font-weighr:600;
  padding: 8px 16px;
  text-decoration: none;
  border-bottom:1px solid #8080801f
}


.col-md-5 li a:hover {
  background-color: #555;
  color: white;
}
</style>
@endpush

@section('content')
@include('layouts.frontend.partial.navmenu')
<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> About Us </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">{{$page_title}}</li>
				</ol>
			</div>
		</div>
	</div>
<br>
    <div class="container SidePadding" >
	  <div class="row" style="border: 1px solid #8080803b;">
	       <div class="col-md-5" data-aos="fade-up" >
		       <img src="{{asset('assets')}}/frontend/images/aaa.jpg"  width="97%"height="300px" style="margin-bottom:20px;"> 
			  
			   <ul data-aos="fade-up" data-aos-delay="200">
			   <h2 style="color: #bf1430;font-size: 28px;letter-spacing: 2px;font-weight: 600">মুক্তিযুদ্ধের ঘটনাবলী</h2><hr>
				  <li><a href="{{route('freedom.fighter',21)}}">আগানগর</a></li>
				  <li><a href="{{route('freedom.fighter',22)}}">কোন্ডা</a></li>
				  <li><a href="{{route('freedom.fighter',23)}}">তেঘরিয়া</a></li>
				  <li><a href="{{route('freedom.fighter',24)}}">শুভাঢ্যা</a></li>
				  <li><a href="{{route('freedom.fighter',25)}}">জিনজিরা</a></li>
				  <li><a href="{{route('freedom.fighter',26)}}">কালিন্দী</a></li>
				  
				</ul>
							   <ul data-aos="fade-up" data-aos-delay="400">
			   <h2 style="color: #bf1430;font-size: 28px;letter-spacing: 2px;font-weight: 600">আমাদের সম্পর্কে</h2><hr>
				  <li><a href="{{route('background')}}">পরিচিতি</a></li>
              <li><a href="{{route('mission')}}">আমাদের লক্ষ্য</a></li>
			  <li><a href="{{route('volunteer')}}">আমাদের  কার্যক্রম</a></li>
              <li><a href="{{route('goals')}}">আমাদের সফলতা</a></li>
				  
				</ul>
				 
		   </div>
		    <div class="col-md-7">
			@foreach($services as $service)
			<img data-aos="slide-left" src="{{'http://dkshomiti.com/framework/storage/app/public/service/'.$service->image}}" height="300px" width="100%"><br>
			<div class="about" style="margin-top:35px;background-color:#fafafa;padding:30px;margin-right:20px;margin-bottom:20px">
			<h2 style="color: #bf1430;font-size: 28px;letter-spacing: 2px;font-weight: 600">{{$page_title}}</h2>
			<hr>
			
			
			
			{!! $service->body !!}
			  
			@endforeach


		
			</div>
		   </div>
	  </div>
	</div>
	
	

    
	

	
	
	

	
	
	<!-- Contact Us -->
	
    
@endsection

@push('js')

@endpush