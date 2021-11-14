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

</style>


@endpush

@section('content')
@include('layouts.frontend.partial.navmenu')
<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
		
			<h1 class="mt-4 mb-3"> মুক্তিযুদ্ধের ঘটনাবলী </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html">Home</a>
					</li>
					
					<li class="breadcrumb-item active">
					{{$subtagInfo->name}}
					
					</li>
				</ol>
			</div>
		</div>
</div>
<div id="governing"class="container" style="background-color:#fff;">
        
        <div class="gvo-heading" style="padding-bottom:10px;">
		  <h4>  
			
                   {{$subtagInfo->name}} মুক্তিযুদ্ধের ঘটনাবলী <hr>	   
			
          </h4>			
        </div>
		 
		 <p style="text-align:justify">
		     	 
				 {!! $subtagInfo->description!!}
		 </p>
       <br>
	    <div class="gvo-heading" style="padding-bottom:10px;" data-aos="fade-up">
		  <h4>  
			
                   {{$subtagInfo->name}} ইউনিয়ন  সম্মানিত  মুক্তিযোদ্ধার  তালিকা<hr>	   
			
          </h4>			
        </div>
		<br><br>
          <div class="row" >
		         
				    
                 	  
                @foreach($freedomFighters as $committee)
                        
                 <div class="col-lg-4 mb-4">
					<div class="card h-100 text-center">
						<div class="our-team"><br><br>
						   <a href="{{route('single.fighter',$committee->id)}}">
							<img class="img-fluid" src="{{'http://dkshomiti.com/framework/storage/app/public/personel/'.$committee->image}}" alt="" />
							<div class="team-content">
								<h3 class="title">{{$committee->name}}</h3>
								
								
							</div>
							</a>
						</div>
					</div>
				</div>
                     
                       
                @endforeach
				
         </div>
      
	</div>
	
	
@endsection

@push('js')


@endpush

 