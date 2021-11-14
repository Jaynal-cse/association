

@extends('layouts.frontend.app')

@section('title','CricExtra')

@push('css')
<style>

.icon-bar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.icon-bar a {
  float: left;
  width: 20%;
  text-align: center;
  padding: 12px 0;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
}

.icon-bar a:hover {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
}
 
.looking-text {
    color: green;
    padding-left: 40%;
    padding-right: 15%;
    font-size: 20px;
    font-weight: 600;
 }
 .mission , .goal{
	 background-color: #ebf5fb ;
	 padding: 5% 5%;
	 color:#808080a8;
 }
 .mission-text ,.goal-text{
	 text-align:justify;
	 padding-right:5%;
	 border-right:1px solid red;
	 color:#808080a8;
 }
 
 .mission-title,.goal-title{
	text-align:center;
	 padding-top:3%;
 }
 .vission , .core{
	 background-color:#eeebfb;
	 padding: 5% 5%;
	 color:#808080a8;
 }
 .vission-text ,.core-text{
	 text-align:justify;
	 padding-left:5%;
	 
 }
 
 .vission-title,.core-title{
	 border-right:1px solid red;
	text-align:center;
	 padding-top:3%;
 }
 
.services-bar {
    padding: 20px 0px 30px 0px;
    background: url(../images/dott.jpg);
}
.milestion-image{
	padding:5%;
	width:100%;
}
</style>
@endpush

@section('content')

    <header class="slider-main">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            
            <div class="carousel-inner" role="listbox">
			@foreach($posts as $key => $post)
               <!-- Slide One - Set the background image for this slide in the line below -->
               <div class="carousel-item {{$key == 0 ? 'active' : '' }}" style="background-image: url('{{Storage::disk('public')->url('slider/'.$post->image)}}')">
                  <div class="topbar"  style="opacity:0.7">
				      <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
					  <p class="looking-text">I am Looking for </p>
						  <form class="form-inline" action="/action_page.php" style="display:right">
							<input class="form-control mr-sm-2" type="text" placeholder="Search">
							<button class="btn btn-success" type="submit">Search</button>
						  </form>
					 </nav> 
				  </div>
				  
				  <div class="carousel-caption d-none d-md-block">
                     <h3>{!! $post->comment !!}</h3>
                     <p>{{$post->person}}</p>
                  </div>
               </div>
               <!-- Slide Two - Set the background image for this slide in the line below -->
             @endforeach 
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
            </a>
        </div>
    </header>
	
	

<nav class="navbar navbar-expand-lg navbar-dark bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">
				<img src="{{asset('assets')}}/frontend/images/logo.png" alt="logo" />
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link " href="{{route('home')}}">Home</a>
					</li>
					
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" id="navbarDropdownAbout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About <i class="fas fa-sort-down"></i></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownAbout">
							<a class="dropdown-item" href="{{route('about')}}">About US</a>
							<a class="dropdown-item" href="404.html">Governing Body</a>
							<a class="dropdown-item" href="pricing.html">JBFF Staff</a>
							<a class="dropdown-item" href="pricing.html">Our Donar</a>
							<a class="dropdown-item" href="{{route('faq')}}">FAQ</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" id="navbarDropdownOrg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Organization <i class="fas fa-sort-down"></i></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownOrg">
							<a class="dropdown-item" href="faq.html">Japan Bangladesh Friendship Hospital</a>
							<a class="dropdown-item" href="404.html">Japan Bangladesh Friendship Nursing College</a>
							<a class="dropdown-item" href="pricing.html">Internation Institute of Health Science</a>
							<a class="dropdown-item" href="404.html">TheMats</a>
							<a class="dropdown-item" href="404.html">Skill Development Institute</a>
							<a class="dropdown-item" href="404.html">North Western Nursing Institute</a>
							<a class="dropdown-item" href="404.html">EverGreen Nursing Institute</a>
							<a class="dropdown-item" href="404.html">Dhaka EverGreen Retirement Homes</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('notice')}}">Notice</a>
					</li>
					
					<li class="nav-item dropdown">
						<a class="nav-link" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Scholarship <i class="fas fa-sort-down"></i></a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
							<a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
							<a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
							<a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
						</div>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="{{route('contact')}}">Contact</a>
					</li>
				</ul>
            </div>
        </div>
    </nav>
	
	



	
	<br><br>
    <!-- Page Content -->
    <div class="container">        
        <!-- About Section -->
        <div class="about-main">
            <div class="row">
			
               <div class="col-lg-6">
                  <h2  style="font-size:25px">Message From Chairman</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
				  <h5>Our smart approach</h5>
                  <ul>
                     <li>Sed at tellus eu quam posuere mattis.</li>
					 <li>Sed at tellus eu quam posuere mattis.</li>
					 <li>Sed at tellus eu quam posuere mattis.</li>
                                       
                  </ul>
               </div>
               <div class="col-lg-6">
                  <img class="img-fluid rounded" src="{{asset('assets')}}/frontend/images/about-img.jpg" alt="" />
               </div>
            </div>
            <!-- /.row -->
        </div>
	</div>
     <br><br>
    <div class="our-mission">
	    <div class="container ">
	      <div class="row mission" style="margin: -2.5% 0px;" >
	         <div class="col-md-8 mission-text" style="font-color:red !important;">
			    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.
			 
	         </div>
			 <div class="col-md-4 mission-title">
			    <h2> Mission</h2>
			 
	         </div>
	       </div>
		   <br><br>
		   <div class="row vission" style="margin: -2.5% 0px;">
		   <div class="col-md-4 vission-title">
			    <h2> Vission  </h2>
			 
	         </div>
	         <div class="col-md-8 vission-text">
			    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.
			 
	         </div>
			 
	       </div>
		    <br><br>
		   <div class="row goal" style="margin: -2.5% 0px;">
	         <div class="col-md-8 goal-text">
			    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.
			 
	         </div>
			 <div class="col-md-4 goal-title">
			    <h2> Our Goals</h2>
			 
	         </div>
	       </div>
		    <br><br>
		    <div class="row core" style="margin: -2.5% 0px;">
		   <div class="col-md-4 core-title">
			    <h2> Core Value  </h2>
			 
	         </div>
	         <div class="col-md-8 core-text">
			    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.
			 
	         </div>
			 
	       </div>
	    </div>
	 </div> <br>
	 <br>
	<div class="customers-box"> 
		<div class="container">
			<!-- Our Customers -->
			<h2 style="font-size:30px">Our Milestons</h2>
			 <img class="milestion-image" src="{{asset('assets')}}/frontend/images/111.jpg">
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>

		<div class="container">
        <!-- Portfolio Section -->
        <div class="portfolio-main">
            <h2>Gallery</h2>
			<div class="col-lg-12">
				<div class="project-menu text-center">
					<button class="btn btn-primary active" data-filter="*">All</button>
					<button data-filter=".business" class="btn btn-primary">Business</button>
					<button data-filter=".travel" class="btn btn-primary">Travel</button>
					<button data-filter=".financial" class="btn btn-primary">Financial</button>
					<button data-filter=".academic" class="btn btn-primary">Academic</button>
				</div>
			</div>
            <div id="projects" class="projects-main row">
               <div class="col-lg-4 col-sm-6 pro-item portfolio-item financial">
                  <div class="card h-100">
                     <div class="card-img">
                        <a href="{{asset('assets')}}/frontend/images/portfolio-img-01.jpg" data-fancybox="images">
                           <img class="card-img-top" src="{{asset('assets')}}/frontend/images/portfolio-img-01.jpg" alt="" />
                           <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                        </a>
                     </div>
                     <div class="card-body">
                        <h4 class="card-title">
                           <a href="#">Financial Sustainability</a>
                        </h4>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6 pro-item portfolio-item business academic">
                  <div class="card h-100">
                     <div class="card-img">
                        <a href="{{asset('assets')}}/frontend/images/portfolio-img-02.jpg" data-fancybox="images">
                           <img class="card-img-top" src="{{asset('assets')}}/frontend/images/portfolio-img-02.jpg" alt="" />
                           <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                        </a>
                     </div>
                     <div class="card-body">
                        <h4 class="card-title">
                           <a href="#">Financial Sustainability</a>
                        </h4>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6 pro-item portfolio-item travel">
                  <div class="card h-100">
                     <div class="card-img">
                        <a href="{{asset('assets')}}/frontend/images/portfolio-img-03.jpg" data-fancybox="images">
                           <img class="card-img-top" src="{{asset('assets')}}/frontend/images/portfolio-img-03.jpg" alt="" />
                           <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                        </a>
                     </div>
                     <div class="card-body">
                        <h4 class="card-title">
                           <a href="#">Financial Sustainability</a>
                        </h4>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6 pro-item portfolio-item business">
                  <div class="card h-100">
                     <div class="card-img">
                        <a href="{{asset('assets')}}/frontend/images/portfolio-img-04.jpg" data-fancybox="images">
                           <img class="card-img-top" src="{{asset('assets')}}/frontend/images/portfolio-img-04.jpg" alt="" />
                           <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                        </a>
                     </div>
                     <div class="card-body">
                        <h4 class="card-title">
                           <a href="#">Financial Sustainability</a>
                        </h4>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6 pro-item portfolio-item travel">
                  <div class="card h-100">
                     <div class="card-img">
                        <a href="{{asset('assets')}}/frontend/images/portfolio-img-05.jpg" data-fancybox="images">
                           <img class="card-img-top" src="{{asset('assets')}}/frontend/images/portfolio-img-05.jpg" alt="" />
                           <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                        </a>
                     </div>
                     <div class="card-body">
                        <h4 class="card-title">
                           <a href="#">Financial Sustainability</a>
                        </h4>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6 pro-item portfolio-item financial academic">
                  <div class="card h-100">
                     <div class="card-img">
                        <a href="{{asset('assets')}}/frontend/images/portfolio-img-01.jpg" data-fancybox="images">
                           <img class="card-img-top" src="{{asset('assets')}}/frontend/images/portfolio-img-01.jpg" alt="" />
                           <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                        </a>
                     </div>
                     <div class="card-body">
                        <h4 class="card-title">
                           <a href="#">Financial Sustainability</a>
                        </h4>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.row -->
        </div>
    </div>
	
	<div class="services-bar">
		<div class="container">
			<h1 class="py-4" style="font-size:30px">Daily Event Update </h1><br>
			<!-- Services Section -->
			<div class="row">
			@foreach($services as $service)
			   <div class="col-lg-4 mb-4">
					<div class="card h-100">
						<div class="card-img">
							<img class="img-fluid" src="{{Storage::disk('public')->url('service/'.$service->image)}}" alt="" />
						</div>
						<div class="card-body">
							<h4 class="card-header"> {{$service->title}} </h4>
							<p class="card-text"> {!! $service->body  !!}</p>
						</div>
					</div>
			   </div>
			 @endforeach
			   
			</div>
			<!-- /.row -->
		</div>
	</div>
		<div class="blog-slide">
		<div class="container">
			<h2 style="font-size:30px"><br>Know the Gl<u>obal Health Car</u>e Community<br> </h2>
			<div class="row">
				<div class="col-lg-12">
					<div id="blog-slider" class="owl-carousel">
					   @foreach($activites as $activity)
						<div class="post-slide">
							<div class="post-header">
								<h4 class="title">
									<a href="#">{{$activity->title}}</a>
								</h4>
								
							</div>
							<div class="pic">
								<img src="{{ Storage::disk('public')->url('post/'.$activity->image)}}" alt="">
								<ul class="post-category">
									<li><a href="#">Business</a></li>
									<li><a href="#">Financ</a></li>
								</ul>
							</div>
							<p class="post-description">
							{!!str_limit($activity->body,'200') !!}
							</p>
						</div>
		               @endforeach
						
						
						
						
					</div>
				</div>
			</div>
		</div>
	</div>	

	<div class="container">
	   
				  Connected With JBFF
				
	    <div class="icon-bar">
		   
		     
				  <a href="#" ><i class="fa fa-facebook"></i></a> 
				  <a href="#"><i class="fa fa-envelope"></i></a> 
				  <a href="#"><i class="fa fa-globe"></i></a>
				  <a href="#"><i class="fa fa-trash"></i></a>
			   
					  
        </div>
		
	</div>
	
	
	<!-- Contact Us -->
	<div class="touch-line">
		<div class="container">
			<div class="row">
			
				   <a class="btn btn-lg btn-secondary btn-block" href="#"> Stay Connected</a>
				
				<div class="col-md-12">
				    <form class="form-inline" action="/action_page.php">
					
					<input type="text" class="form-control" placeholder="Name" id="email">
  
  <input type="email" class="form-control" placeholder="Email" id="email">
  
  
  
  <input type="text" class="form-control" placeholder="Phone" id="pwd">
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 
				</div>
				
			</div>
		</div>
	</div>
    
@endsection

@push('js')

@endpush