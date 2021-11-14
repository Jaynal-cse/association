

@extends('layouts.frontend.app')

@section('title','CricExtra')

@push('css')

@endpush


@push('js')

@endpush
@section('content')
@include('layouts.frontend.partial.navmenu')

	<!-- full Title -->
	<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> Blog Detail </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active"> Blog Detail </li>
				</ol>
			</div>
		</div>
	</div>

    <div class="blog-main">
		<div class="container">
			<div class="row">
			<!-- Post Content Column -->
				<div class="col-lg-8" data-aos="fade-up">
					<!-- Preview Image -->
					<img class="img-fluid rounded" src="{{'http://dkshomiti.com/framework/storage/app/public/post/'.$service->image}}" alt="" />
					<hr>
						<!-- Date/Time -->
						<p data-aos="fade-up" data-aos-delay="200">Posted on {{date('M d, Y',strtotime($service->created_at))}}</p>
					<hr>
					<!-- Post Content -->
					<p data-aos="fade-up" data-aos-delay="300"  class="lead">{{$service->title}}</p>

					<p> {!! $service->body !!} </p>
				<hr>
				<div class="pagination_bar_arrow"  >
					  <!-- Pagination -->
						<ul class="pagination justify-content-center mb-4">
						   @if(isset($only_previous_record->id))
							<li class="page-item">
								<a class="page-link" href="{{route('singlepost',$only_previous_record->id)}}">&larr; Prev</a>
							</li>
						  @endif
							@if(isset($only_next_record->id))
							<li class="page-item"   >
								<a class="page-link"  href="{{route('singlepost',$only_next_record->id)}}">Next &rarr;</a>
							</li>
							@endif
						</ul>
					</div>
			</div>

			<!-- Sidebar Widgets Column -->
			<div class="col-md-4 blog-right-side">

			  <!-- Search Widget -->
			  <div class="card mb-4">
				<h5 class="card-header">Search</h5>
				<div class="card-body">
				  <div class="input-group">
					<input type="text" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
					  <button class="btn btn-secondary" type="button">Go!</button>
					</span>
				  </div>
				</div>
			  </div>

			  <!-- Side Widget -->
			  <div class="card my-4">
				<h5 class="card-header">Side Widget</h5>
				<div class="card-body">
				  You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
				</div>
			  </div>
			  
			  <!-- Categories Widget -->
			  <div class="card my-4">
				<h5 class="card-header">Categories</h5>
				<div class="card-body">
				  <div class="row">
					<div class="col-lg-6">
					  <ul class="list-unstyled mb-0">
						<li>
						  <a href="#">Web Design</a>
						</li>
						<li>
						  <a href="#">HTML</a>
						</li>
						<li>
						  <a href="#">Freebies</a>
						</li>
					  </ul>
					</div>
					<div class="col-lg-6">
					  <ul class="list-unstyled mb-0">
						<li>
						  <a href="#">JavaScript</a>
						</li>
						<li>
						  <a href="#">CSS</a>
						</li>
						<li>
						  <a href="#">Tutorials</a>
						</li>
					  </ul>
					</div>
				  </div>
				</div>
			  </div>

			</div>

		  </div>
		  <!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	
	
	

	
	
	<!-- Contact Us -->
	
    
@endsection

