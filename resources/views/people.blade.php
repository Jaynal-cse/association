@extends('layouts.frontend.app')

@section('title','Governing Body')

@push('css')


<style>
div.gallery img {
width: 200px;
height: 200px;
padding-top: 0px;

}

div.gallery img:hover{
    width: 55%;
  
    transition: width .5s;
	
}




div.gallery {
  height: 330px;
    width: 100%;
 
  text-align: center;
  margin:0px;
}

@media only screen and (max-width: 767px) {
  div.gallery {
    height: 450px;
  }
}

@media only screen and (max-width: 400px) {
  div.gallery {
    height: 350px;
  }
}

@media only screen and (max-width: 300px) {
  div.gallery {
    height: 300px;
  }
}

div.desc {
 padding: 15px;
text-align: center;
line-height: 23px;
letter-spacing: 1px;
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

p {
   
    color: gray;
    font-family: robotoo;
}

</style>

@endpush

@section('content')
@include('layouts.frontend.partial.navmenu')
<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			
			<h1 class="mt-4 mb-3"> 
			    <?php  echo $section_name->name ?> </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html">Home</a>
					</li>
					
					<li class="breadcrumb-item active">
					
					<?php  echo $section_name->name ?> 
					
					</li>
				</ol>
			</div>
		</div>
</div>
<div id="governing"class="container" style="background-color:#fff">
        
        <div class="gvo-heading" style="padding-bottom:10px;">
		  <h4>  
			
                   <?php  echo $section_name->name ?>
          </h4>			
        </div>
		  <p style="text-align:justify">
		    
			 {!! $section_name->detail !!}
			
		 
		 </p>
		 
       <br>
          <div class="row"  >
                <?php for($i=0;$i<count($personels);$i++) { ?>		  
                @foreach($personels[$i] as $committee)
                        
                    <div class="col-md-3 " style="background-color:#ebf5fb;margin-bottom:0px;margin-top:0px;border: 2px solid #fff;">        
                        <div class="gallery" style="padding-top: 10px;">
                      
                             <a href="{{route('single.fighter',$committee->id)}}" >
                                <img  src= "{{'http://dkshomiti.com/framework/storage/app/public/personel/'.$committee->image}}"  style="transition: .3s ease-in-out"class="rounded-circle" style="border-radius: 50% !important;">
                            
                            <div class="desc" data-aos="fade-up">
                                 <h6>{{$committee->name}}</br></h6>
                                 <p> 
								  @foreach($designations as $designation)
								    @if($designation->id == $committee->subtag_id)
										
								        {{ $designation->name}}
							        @endif
								  @endforeach
								  </br>{{$committee->phone}}
								  </br>{{$committee->email}}
								 </p>
								 
                                 
                                    
                            </div>
                           </a>
                        </div>
                    </div>
                     
                       
                @endforeach
				<?php } ?>
         </div>
      
	</div>
	
	
@endsection

@push('js')


@endpush

 