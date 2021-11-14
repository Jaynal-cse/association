@extends('layouts.frontend.app')

@section('title','Governing Body')

@push('css')

<style>
.card {
   
   
    width: 300px;
}
* {
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
.post {
	color: gray;

line-height: 11px;
}
</style>


@endpush

@section('content')
@include('layouts.frontend.partial.navmenu')
<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
		
			<h1 class="mt-4 mb-3">জীবনী  এবং অভিজ্ঞতা </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html">Home</a>
					</li>
					
					<li class="breadcrumb-item active">
					{{$subtag_name->name}}
					
					</li>
				</ol>
			</div>
		</div>
</div>
<div id="governing"class="container" style="background-color:#fff;">
        
    <br>
         
     <div class="row">
				    
        <div class="col-md-4">       
             <div class="card h-100 text-center">
						
							<img data-aos="slide-right"class="img-fluid" src="{{'http://dkshomiti.com/framework/storage/app/public/personel/'.$figterInfo->image}}" alt="Photo of {{$figterInfo->name}}" height="200px" width="300px" />
							<div class="team-content">
								<h3 class="title"><br>{{$figterInfo->name}}</h3><hr>
								<span class="post" style="line-height: 11px;">
								
								<p>{{$figterInfo->phone}}</p>
								<p>{{$figterInfo->email}}</p>
								<p>{{$subtag_name->name}}</p>
								
                                 
								
								</span>
								
							</div>
						
					</div>           
        </div>   
        <div class="col-md-8" style="background-color:#fafafa;padding:20px" data-aos="fade-up"> 
                <h4 style="font-size: 23px;color:#962429;font-weight:700">    জনাব  {{$figterInfo->name}} এর জীবনী  এবং  অভিজ্ঞতা </h4> <hr>
                  {!! $figterInfo->message !!}      
        </div>         		
					
					
	</div>
				
                  
                       
           
</div>
      
<br><br>
	
	
@endsection

@push('js')


@endpush

 