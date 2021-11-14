

@extends('layouts.frontend.app')

@section('title','CricExtra')

@push('css')
<style>
.blog-entries nav{
	padding-left: 34%;
}

</style>
@endpush

@section('content')
@include('layouts.frontend.partial.navmenu')
<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> Latest News </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">Latest News</li>
				</ol>
			</div>
		</div>
	</div>

       <div class="blog-main">
		<div class="container">
			<div class="row">
				<!-- Blog Entries Column -->
				<div class="col-md-8 blog-entries">
					<!-- Blog Post -->
					@foreach($services as $service)
					<div class="card mb-4" data-aos="fade-up">
						<img class="card-img-top" data-aos="slide-right" src="{{'http://dkshomiti.com/framework/storage/app/public/post/'.$service->image}}" alt="Card image Blog" />
						<div class="card-body">
							
							<h2 class="card-title">{{$service->title}}</h2>
							<div class="by-post" >
								Posted on {{date('M d, Y',strtotime($service->created_at))}} 
							</div>
							<hr>
							<p class="card-text">{!! str_limit($service->body,'225') !!}</p>
							<a href="{{ route('singlepost',$service->id) }}" target="_blank" class="btn btn-primary">Continue &rarr;</a>
						</div>
					</div>
					@endforeach
					{{$services->links()}}
					<!-- Blog Post -->
				
					<!-- Blog Post -->
				
					
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

@push('js')

@endpush