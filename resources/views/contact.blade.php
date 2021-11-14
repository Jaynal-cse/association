

@extends('layouts.frontend.app')

@section('title','CricExtra')

@push('css')

@endpush

@section('content')
@include('layouts.frontend.partial.navmenu')	
<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> যোগাযোগ করুন </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">যোগাযোগ</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="contact-main">
		<div class="container">
			<!-- Content Row -->
		  <div class="row">
			<!-- Map Column -->
				<div class="col-lg-8 mb-4 contact-left">
					<h3 style="text-transform:uppercase">আমাদের সাথে যোগাযোগ  করুন</h3><hr><br>
					<form method="POST" action="{{route('contact.store')}}" name="sentMessage" id="contactForm" novalidate data-aos="fade-up">
						@csrf
						
						<div class="control-group form-group">
							<div class="controls">
								<input type="text" placeholder="নাম" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
								<p class="help-block"></p>
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<input type="text" placeholder="ফোন নাম্বার" name="phone" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
							</div>
						</div>
						<div  style="display:none;"class="control-group form-group">
							<div class="controls">
								<input type="text"  name="connect_type" value="{{$idea}}" >
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<input type="email"  name="email" placeholder="ইমেইল" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
							</div>
						</div>
						
						<div class="control-group form-group">
							<div class="controls">
								<textarea rows="5" cols="100" placeholder="আপনার মতামত..." name="body" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
							</div>
						</div>
						<div id="success"></div>
						<!-- For success/fail messages -->
						<button type="submit" class="btn btn-primary" id="sendMessageButton">যোগাযোগ</button>
					</form>
				</div>
				<!-- Contact Details Column -->
				<div class="col-lg-4 mb-4 contact-right" data-aos="slide-left">
					<h3>যোগাযোগ  তথ্য</h3><hr>
					<p>
						Makka Tower
						<br>Level-5,820
						<br>Shewrapara,Metro Rail Station
						<br>Begum Rokeya Sarani
						<br>Mirpur,Dhaka
					</p>
					<p>
						<abbr title="Phone">P</abbr>:+8801767334422
						                             
					</p>
					<p>
						<abbr title="Phone">P</abbr>:+8801679700600
						                             
					</p>
					<p>
						<abbr title="Email">E</abbr>:
						<a href="mailto:name@example.com"> name@example.com </a>
					</p>
					
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	
	<div class="map-main">
		<!-- Embedded Google Map -->
		<iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
	</div>

	
	
	<!-- Contact Us -->
	
    
@endsection

@push('js')

@endpush