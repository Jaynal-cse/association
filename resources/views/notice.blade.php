

@extends('layouts.frontend.app')

@section('title','CricExtra')

@push('css')

@endpush

@section('content')
@include('layouts.frontend.partial.navmenu')
<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> Notice </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html">Home</a>
					</li>
					<li class="breadcrumb-item active">Notice</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="contact-main">
		<div class="container">
			
	<h2  style="text-align:center;font-size:24px;color:#1273eb"> {{$page_title}}</h2><br><br>		
	<table class="table table-hover" style="border:1px solid #dee2e6">
	
    <thead>
      <tr  >
        <th style="width:50%">Title</th>
        <th style="width:30%">Published</th>
        <th style="width:20%">Download</th>
      </tr>
    </thead>
	<tfoot>
      <tr>
        <th>Title</th>
        <th>Published</th>
        <th>Download</th>
      </tr>
    </tfoot>
    <tbody>
	 @foreach($notices as $key => $notice)
      <tr>
        <td>{{$notice->title}}</td>
        <td>{{$notice->created_at->format('d M Y')}}</td>
        <td><a href="{{'http://jbffbd.com/jbff/storage/app/public/personel/'.$notice->image}}">Download</a></td>
      </tr>
	  @endforeach
      
    </tbody>
  </table>
			
			
			
			
		</div>
		<!-- /.container -->
	</div>
	
	

	
	
	<!-- Contact Us -->
	
    
@endsection

@push('js')

@endpush