@extends('layouts.frontend.app')

@section('title','Governing Body')

@push('css')

<style>


div.desc {
  padding: 15px;
  text-align: center;
}

.gvo-heading h4{
    text-transform: uppercase;
	color: #1273eb;
    text-align: center;
    padding-top: 60px;
padding-bottom: 0px;
}

#governing .col-md-3 {
   
    background-color: grey;
    position: relative;

padding-right: 0px;
padding-left: 0px;
}

#about{
    margin: 0px 7%;
}

#about h2{
    text-transform: uppercase;
    text-align: center !important;
}


#about p{
    text-align:justify;
}
.breadcrumb .active{
	background-color:#1273eb;
}
</style>


@endpush

@section('content')
@include('layouts.frontend.partial.navmenu')
<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			
			<h1 class="mt-4 mb-3">আবেদন প্রক্রিয়া </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html">Home</a>
					</li>
					
					<li class="breadcrumb-item active">
					 আবেদন প্রক্রিয়া
					
					</li>
				</ol>
			</div>
		</div>
</div>
<div id="governing"class="container" style="background-color:#fff;">
      
        <div class="gvo-heading" style="padding-bottom:10px;">
		  <h4>আবেদন প্রক্রিয়া</h4>			
        </div>
		 
		 <p style="text-align:justify">
		     
			 {!! $scholarship->description !!}
			
		 
		 </p>
		  
       <br><br><br><br>
          <div class="row" >  
                @foreach($personels as $committee)
                        
                    <div class="col-lg-4 mb-4">
					<div class="card h-100 text-center">
						<div class="our-team">
							<img class="img-fluid" src="{{'http://jbffbd.com/jbff/storage/app/public/personel/'.$committee->image}}" alt="" />
							<div class="team-content">
								<h3 class="title">{{$committee->name}}</h3>
								<span class="post">
								
								Scholarship Winner
								
								</span>
								<ul class="social">
									<li><a href="#"><i class="fab fa-facebook"></i></a></li>
									<li><a href="#"><i class="fab fa-google-plus"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#"><i class="fab fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
                     
                       
                @endforeach
         </div>
      
	</div>
	<div class="btn btn-primary" style="width:20%;margin-bottom:20px;margin-left:40%;" >
	    
	
				
				 <a  style="color:#fff;"href="{{route('applyscholarship1')}}">সদস্য ফরম</a><br>
		        
		
	</div>
	
	
@endsection

@push('js')


@endpush

 