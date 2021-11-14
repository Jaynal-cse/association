

@extends('layouts.frontend.app')

@section('title','CricExtra')


@push('css')
<link href="{{asset('assets')}}/frontend/css/animate.css" rel="stylesheet">

<style>
.d-none{
	top:300px;
	left:50x;
}
#left-title{
	float: left;
    width: 47%;
	height: 300px;
	margin-right: 28px;
	background-color: #dcdcdc8c;
	
	
}
#left-title img{
	width: 100%;
    height: 220px;
	padding: 7px;
	
}
#right-title{
	float: right;
    width: 47%;
	height: 300px;
	margin-left: 28px;
	background-color: #dcdcdc8c;
    
	
}
#right-title img{
	width: 100%;
    height: 220px;
	padding: 7px;
		
}
.speech{
	font-size: 25px;
	letter-spacing: 3px;
	line-height: 34px;
	transition: .3s ease-in-out;
}

.speech:hover{
	font-size: 28px;
	color:rebeccapurple;
}
.name-text{
	text-align: center;
	letter-spacing: 1px;
	font-size: 16px;
	margin-top: -14px;
	color: rebeccapurple;
	transition: .3s ease-in-out;
}
.title-text{
	text-align: center;
	letter-spacing: 2px;
	margin-top: -10px;
	color: rebeccapurple;
	transition: .3s ease-in-out;
}
.title-text:hover{
	color:#339981;
	font-size:18px;
	
}
.name-text:hover{
color:#339981;
	font-size:19px;
}
.mission{
	margin-bottom: -5.8%;
}
.mission h2,.vission h2{
	font-size: 29px;
letter-spacing: 3px;
line-height: 34px;
border-bottom: 2px solid rebeccapurple;
margin-left: 47%;
margin-bottom: 35px;
}
.mission h2:hover,.vission h2:hover{
	font-size: 32px;
	color:#339981;
	border-bottom: 2px solid #339981;
}

.more{
	position: relative;
	left: 46%;
}
@media only screen and (max-width: 420px) {
	#left-title{
	
	height: 330px;
	
	}
	#right-title{
	
	height: 330px;

    
	
}
	
} 
@media only screen and (max-width: 520px) {
	
	.mission h2,.vission h2{

margin-left: 40%;

}
.more{
	
	left: 35%;
}
} 



.carousel-item.active .carousel-caption p{
	animation-duration: 1s;
  animation-fill-mode: both;
  animation-name: cfadeInLeft;
  animation-delay: .5s;
}
.carousel-item.active .carousel-caption .content h3 {
  animation-duration: 1s;
  animation-fill-mode: both;
  animation-name: cfadeInLeft;
  animation-delay: .9s;
}
 .button-area {
	 float:left;
  animation-duration: 1s;
  animation-fill-mode: both;
  animation-name: cfadeInLeft;
  animation-delay: .9s;
}
 .button-area ul {
  margin: 0;
  padding: 0;
  list-style: none;
  text-align: text;
}
 .button-area ul li {
  display: inline-block;
  margin-right: 30px;
  border: 1px solid #00A0C6;
  transition: 0.3s;
}
 .button-area ul li:hover {
  border: 1px solid #000;
  background-color:#000;
  transition: 0.3s;
}
 .button-area ul li:last-child {
  margin-right: 0;
}
.button-area ul li:last-child a {
  background: #000;
  
}
.button-area ul li a {
  display: block;
  padding: 10px 30px;
  color: #fff;
  background: #00A0C6;
  font-size: 18px;
  font-weight: 500;
}
@keyframes cfadeInUp {
  from {
    opacity: 0;
    transform: translate3d(0, -100px, 0);
  }
  to {
    opacity: 1;
    transform: translate3d(0, 0, 0);
  }
}
@keyframes cfadeInLeft {
  from {
    opacity: 0;
    transform: translate3d(-100px, 0, 0);
  }
  to {
    opacity: 1;
    transform: translate3d(0, 0, 0);
  }
}
@keyframes cfadeInRight {
  from {
    opacity: 0;
    transform: translate3d(100px, 0, 0);
  }
  to {
    opacity: 1;
    transform: translate3d(0, 0, 0);
  }
}
@keyframes cfadeInDown {
  from {
    opacity: 0;
    transform: translate3d(0, -100px, 0);
  }
  to {
    opacity: 1;
    transform: translate3d(0, 0, 0);
  }
}



</style>

@endpush

@section('content')
@include('layouts.frontend.partial.navmenu')
<header class="slider-main" style="">
 
        <div id="carouselExampleIndicators" class="carousel  carousel-fade" data-ride="carousel" data-interval="5000">
            
            <div class="carousel-inner" role="listbox">
			 
			@foreach($posts as $key => $post)
               <!-- Slide One - Set the background image for this slide in the line below -->
          
               <div class="carousel-item {{$key == 0 ? 'active' : '' }}" style=" width:100%;background-image:url({{'http://dkshomiti.com/framework/storage/app/public/slider/'.$post->image}})">
                  <div class="topbar"   style="opacity:0.7;">
				      
				  </div>
				  
				  <div class="carousel-caption d-none d-md-block" >
                     <h3 style="text-align:left" >{!! $post->comment !!}</h3>
                     <p  style="color:#fff;font-size:16px;text-align:left" >{{$post->person}}</p>
					 <div class="button-area">
                                    <ul>
                                        <li><a class="nirmax-button" href="{{route('applyscholarship1')}}">সদস্য ফরম</a></li>
                                        <li><a class="nirmax-button" href="{{route('core')}}">গঠনতন্ত</a></li>
                                    </ul>
                                </div>
                  </div>
				  
				  
				  <div class="topbar"   style="opacity:0.7; ">
				      <div class="row">
						<div class="col-md-6">
						  <img   class="logo_image"style="margin:10px; width:150px"src="{{asset('assets')}}/frontend/images/DKS-logo.png">
						
					    </div>
						<div class="col-md-6" style="text-align:right">
						  <span class="scroll-bottom"  >
                             	<a class="video video_btn small" style="background-color:#14a34e;"href="">
								<i   class="fa fa-angle-double-down"></i></a>
							  
                           </span>
					    </div>
					  </div>
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
	
    	
	




	
	<br><br>
    <!-- Page Content -->
    <div class="container" data-aos="fade-up">        
        <!-- About Section -->
        <div class="about-main">
            <div class="row">
		      <div class="col-md-6"   id="chairman" style="padding-right:3%;box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"  >
			    <h3 class="speech" data-aos="slide-right" data-aos-delay="200" style="transition: .3s ease-in-out"><br>সভাপতির বাণী</h3>
				<hr>
			     @foreach($chairman_speeches as $chairman_speech)
						   <div  id="left-title"   data-aos="zoom-out" data-aos-delay="400" >
						    <img src="{{'http://dkshomiti.com/framework/storage/app/public/personel/'.$chairman_speech->image}}"><hr>
						    <div class="name-text" >{{$chairman_speech->name}}</div>
							<div class="title-text" >সভাপতি</div>
						    </div>
                       {!! $chairman_speech->message !!}
				  @endforeach
              </div> 
			  
			  <div class="col-md-6"  id="secratary" style="padding-left:3%;box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
			  <h3  class="speech" data-aos="slide-left" data-aos-delay="600" style="transition: .3s ease-in-out"><br>সাধারণ সম্পাদকের বাণী</h3>
			  <hr>
				  @foreach($secratery_speeches as $secratery_speech)
				     <div id="right-title" data-aos="zoom-out" data-aos-delay="800" >
						<img src="{{'http://dkshomiti.com/framework/storage/app/public/personel/'.$secratery_speech->image}}"  ><hr>
					 <div class="name-text" >{{$secratery_speech->name}}</div>
							<div class="title-text" >সাধারণ সম্পাদক</div>
					</div>
						{!! $secratery_speech->message !!}
				  @endforeach
			 </div> 
               
               
                 
            </div>
            <!-- /.row -->
        </div>
	</div>
     <br>
    <div class="our-mission" >
	    <div class="container "data-aos="fade-up">
	      <div class="row mission">
	         <h2 style="transition: .3s ease-in-out "> মিশন</h2>
			      <p>  @foreach($missions as $mission)
			        {!! str_limit($mission->body,'490') !!}
			         <a  class="btn btn-primary"href="{{route('mission')}}">বিস্তারিত পড়ুন </a>
			        @endforeach</p>
	         
			 
			    
			 
	         
	       </div>
		   <br><br>
		   <div class="row vission" data-aos="fade-up" data-aos-delay="200">
		   
			    <h2 style="transition: .3s ease-in-out"> ভিশন   </h2>
			 
	        
	         
			    <p>  @foreach($vissions as $vission)
			        {!! str_limit($vission->body,'533') !!}
			         <a  class="btn btn-danger"href="{{route('vission')}}">বিস্তারিত পড়ুন </a>
			        @endforeach</p>
	        
			 
	       </div>
		   
		  
	    </div>
	 </div> <br>
	 <br><br>
	 <br>
	 






<?php $arr=array(200,400,600); ?>
<div class="blog-slide">
		<div class="container" data-aos="fade-up">
			<h2 style="letter-spacing: 2px;padding-top:0px;padding-bottom:37px;font-size:30px ">Event Update</h2> 
			<div class="row">
				<div class="col-lg-12">
					<div id="blog-slider" class="owl-carousel">
					   <?php $animation=0;?>
					   @foreach($activites as $activity)
						<div class="post-slide" data-aos="fade-up" data-aos-delay="{{$arr[$animation]}}"	>					<!--	<div class="post-header">
								<h4 class="title">
									<a href="#">{{$activity->title}}</a>
								</h4>
								
							</div>
							-->
							
							<div class="pic">
								<img src="{{'http://dkshomiti.com/framework/storage/app/public/post/'.$activity->image}}" alt="">
								<ul class="post-category">
									<li><a href="#">{{date('M d, Y',strtotime($activity->created_at))}}</a></li>
									
								</ul>
							</div>
							<a href="{{ route('singlepost',$activity->id) }}" target="_blank" style="color:grey">
							<p class="post-description">
							{!!str_limit($activity->body,'200') !!}
							</p></a>
						</div>
						<?php 
			   $animation++;
			   if($animation==3){$animation =0;}
			   ?>
		               @endforeach
						
						
						
						
					</div>
					
				</div>
			</div>
		</div>
	</div>	


	<br><br>
	

	<div class="services-bar ">
		<div class="container latest-news" data-aos="fade-up" >
			<h3 class="py-4" style="font-size:30px ; text-align:center">Our Latest News </h3><br>
			<!-- Services Section -->
			<div class="row">
			<?php  $animation=0;?>
			@foreach($services as  $service)
			   <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="{{$arr[$animation]}}">
					<div class="card h-100"><a href="{{ route('singlepost',$service->id) }}" target="_blank" style="color:grey">
						<div class="card-img ">
							<img class="img-fluid" src="{{'http://dkshomiti.com/framework/storage/app/public/post/'.$service->image}}" alt="" /> 
						</div>
						<div class="card-body">
						
							<h4 class="card-header"> {!! str_limit( $service->title,38 ) !!} </h4>
							<p class="card-text"> {!! str_limit( $service->body,150 ) !!}</p>
						</div>
					</div>
					</a>
			   </div>
			   <?php 
			   $animation++;
			   if($animation==3){$animation =0;}
			   ?>
			 @endforeach
			<div class="more" > <a href="{{route('volunteer')}}" class="btn btn-primary">More News</a></div>		
			 </div>
			<!-- /.row -->
		</div>
	</div>
	
			<div class="container" data-aos="fade-up" >
        <!-- Portfolio Section -->
        <div class="portfolio-main">
            <h2 style="letter-spacing: 2px;padding-top:0px;padding-bottom:37px;font-size:30px ">Gallery</h2> 
			
            <div id="projects" class="projects-main row">
			<?php $animation=0;?>
			@foreach($galleries as $gallery)
               <div class="col-lg-4 col-sm-6 pro-item portfolio-item " data-aos="fade-up" data-aos-delay="{{$arr[$animation]}}">
                  <div class="card h-100">
                     <div class="card-img">
                        <a href="{{'http://dkshomiti.com/framework/storage/app/public/gallery/'.$gallery->image}}" data-fancybox="images">
                           <img class="card-img-top" src="{{'http://dkshomiti.com/framework/storage/app/public/gallery/'.$gallery->image}}" alt="" />
                           <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                        </a>
                     </div>
                     <div class="card-body">
                        <h4 class="card-title">
                           <a href="#">{{$gallery->name}}</a>
                        </h4>
                     </div>
                  </div>
               </div>
			   <?php 
			   $animation++;
			   if($animation==3){$animation =0;}
			   ?>
			   @endforeach
              
              
               
            
               
            </div>
            <!-- /.row -->
        </div>
    </div>
	
	
	
	
			<div class="container" data-aos="fade-up" >
        <!-- Portfolio Section -->
        <div class="portfolio-main">
            <h2 style="letter-spacing: 2px;padding-top:0px;padding-bottom:37px;font-size:30px ">Our Video Gallery</h2> 
			
            <div id="projects" class="projects-main row">
			<?php $animation=0;?>
			@foreach($videos as $video)
               <div class="col-lg-4 col-sm-6 pro-item portfolio-item " data-aos="fade-up" data-aos-delay="{{$arr[$animation]}}">
                  <div class="card h-100">
                     <div class="card-img">
                        <a href="s" data-fancybox="images">
                         
						   <iframe width="100%" height="345" src="{{$video->ref}}" frameborder="0" allowfullscreen>
                           </iframe>
						   
                        </a>
                     </div>
                     
                  </div>
               </div>
			   <?php 
			   $animation++;
			   if($animation==3){$animation =0;}
			   ?>
			   @endforeach
              
              
               
            
               
            </div>
            <!-- /.row -->
        </div>
    </div>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="connect_with">
		<section class="footer__connect-with-us">
			<div class="container-fluid" data-aos="fade-up" >
				<div class="row">
					<div class="col-md">
						<div class="label">
							<h4> <m style="text-transform:uppercase">আমাদের সাথে থাকুন</m><br><m style="color:#ddb052"> ঢাকাইয়া কেরানীগঞ্জ সমিতি</m></h4>
						</div>
					</div>
					<div class="col-md-4">
						<div class="icons">
							<ul class="list list--inline" style="with:100%" role="list">

										<ul class="footer-social">
								<li><a class="facebook hb-xs-margin" href="#"><span class="hb hb-xs spin hb-facebook"><i class="fab fa-facebook-f"></i></span></a></li>
								<li><a class="twitter hb-xs-margin" href="#"><span class="hb hb-xs spin hb-twitter"><i class="fab fa-twitter"></i></span></a></li>
								<li><a class="instagram hb-xs-margin" href="#"><span class="hb hb-xs spin hb-instagram"><i class="fab fa-instagram"></i></span></a></li>
								<li><a class="googleplus hb-xs-margin" href="#"><span class="hb hb-xs spin hb-google-plus"><i class="fab fa-google-plus-g"></i></span></a></li>
								<li><a class="dribbble hb-xs-margin" href="#"><span class="hb hb-xs spin hb-dribbble"><i class="fab fa-dribbble"></i></span></a></li>
							</ul>
							
					</div>        
							
						</div>
					</div>
			</div>
		
	    </section>
	 
	</div>
	
	<div class="stay_connected">
	
	<section class="signup-newsletter">
		<div class="container" data-aos="fade-up" >
			<div class="row">
				
					<div class="newsletter-title col-md-3">  
					    
						<br>
						<p style="color:#fff">Stay</p>
	                    <p style="margin-left:15px;color:#fff"><i>CONNECTED</i></p>
				    </div>
					<div class="newsletter-signup col-md-9">
					        <br>
                            <form class="form-inline" method="POST" id="form-submit" action="{{route('subscriber.store')}}">
							@csrf
							  <div class="row">
							  <input type="hidden" name="id" id="id">
                               <div class="col-md-3">
							   <br><input  style="max-width: 100%;border-radius: 20px; height: 40px; margin-left:2%"type="text" class="form-control" name="name" placeholder="Your Name" id="email">
							   </div>
							   <div class="col-md-3">
							   <br><input  style="max-width: 100%;border-radius: 20px; height: 40px; margin-left:2%" type="text" class="form-control"  name="phone" placeholder="Phone Number" id="email">
							   </div>
							   <div class="col-md-3">
							   <br><input  style="max-width: 100%;border-radius: 20px; height: 40px;margin-left:2%" type="email" class="form-control"name="email" placeholder="Email" id="email">				  				  
							   </div>
							   <div class="col-md-3">
							   <br><button  style="width: 100%;max-width: 100%;border-radius: 20px; height: 40px;margin-left:2%; background-color:#fff"type="submit" id="insertbutton" class="btn btn-primary submit_button">Submit</button>
							  </div>
							  </div>
							</form> 
					</div>
				
			</div>
		</div>
</section>
	
	
	
	
	</div>
	<!-- Contact Us -->
	
    
@endsection

@push('js')


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});

 $('#insertbutton').click(function (e) { 
            e.preventDefault();
            $(this).html('Submit');
			
            $.ajax({
                   data: $('#form-submit').serialize(),
                   url: "{{ route('subscriber.store') }}",
                   type: "POST",
                   dataType: 'json',
                   success: function (data) {  
				   
								swal({
								    'title' : "You are added as Subscriber ",
                                    'text'  : 'You clicked the button!',
                                    'icon'  : 'success',
                                    'button': 'Great!'
                                });
                            },

                    error: function (data) {
                             swal({
                                    'title' : 'Oppsss....',
                                    'text'  : data.message,
                                    'type'  : 'error',
                                    'timer' : '1500',
                                       });

              

          }

      });

    });
 

</script>
@endpush