@extends('layouts.frontend.app')

@section('title','Governing Body')

@push('css')

<style>
.admission-form-ins li{font-size: 16px;line-height: 35px;}


</style>


<style>
 .link-online{
     color:#19191a;
 }  
.link-online:hover{
    color:#366799;
}
.info{
    color:#353333c4;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
    border-top: 3px solid #366ba1;
}
.info-h{
    color: #353333;
}


</style>













</style>


@endpush

@section('content')
@include('layouts.frontend.partial.navmenu')
<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			
			<h1 class="mt-4 mb-3">ঢাকাইয়া কেরানীগঞ্জ সমিতি  </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="index.html">Home</a>
					</li>
					
					<li class="breadcrumb-item active">
					Registration
					</li>
				</ol>
			</div>
		</div>
</div>
<div id="governing"class="container" style="background-color:#fff;">
      
    <div class="form-header"><br><br>
	     <h4 class="info" style="text-align:center;text-transform:uppercase">Apply For Membership
						
						
		</h4>
		 <hr>
	</div>
	<br><br>
	<div class="container">
	    <div class="row">
		    <div class="col-md-8" >
			    <div style="padding-left:0px;margin-left:0%;margin-right:px;">
					<div class="personal-info">
					   <br>
					  <h4 class="info">Personal Information</h4>
					  <hr>
					</div>
			    </div>
				<form    action="" id="form-submit"  method="POST" method="POST" enctype="multipart/form-data">
				@csrf
				
					  
					  <div class="form-group row">
						<label for="applicant" class="col-sm-4 col-form-label">Name of the applicant<span style="color:red">*</span></label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" name="name" id="applicant" placeholder="Name of the applicant">
						</div>
					  </div>
					  
					  <div class="form-group row">
						<label for="Father" class="col-sm-4 col-form-label">Father's Name<span style="color:red">*</span></label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" name="fname" id="Father" placeholder="Father's Name">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="Mother" class="col-sm-4 col-form-label">Mother's Name</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" name="mname"id="Mother" placeholder="Mother's Name">
						</div>
					  </div>
					    <div class="form-group row">
						<label for="Number" class="col-sm-4 col-form-label">Phone Number<span style="color:red">*</span></label>
						<div class="col-sm-8">
						  <input type="number" class="form-control" name="phone" id="Number" placeholder="Phone Number">
						</div>
					  </div>
					   <div class="form-group row">
						<label for="Email" class="col-sm-4 col-form-label">Email</label>
						<div class="col-sm-8">
						  <input type="email" class="form-control"name="email" id="Email" placeholder="Email">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="Birth" class="col-sm-4 col-form-label" >Date of Birth<span style="color:red">*</span></label>
						<div class="col-sm-8">
						  <input type="date" class="form-control" id="Birth" name="dob" placeholder="Date of Birth">
						</div>
					  </div>
					   
					  <div class="form-group row">
						<label for="Address" class="col-sm-4 col-form-label">Present Address<span style="color:red">*</span></label>
						<div class="col-sm-8">
						  <textarea type="text" class="form-control"  name="present_address" id="Address" placeholder="Present Address"></textarea>
						</div>
					  </div>
					  <div class="form-group row">
						<label for="Email" class="col-sm-4 col-form-label">Upload Picture<span style="color:red">*</span></label>
						<div class="col-sm-8">
						  <div class="custom-file">
						<input type="file" name="image" class="custom-file-input" id="customFile">
						<label class="custom-file-label" for="customFile">Choose file</label>
					  </div>
						</div>
					  </div>
					  <div class="personal-info">
					   <br>
					  <h4 class="info">Permanent Address</h4>
					  <hr>
					  
					</div>
					<div class="form-group row">
						<label for="Mother" class="col-sm-4 col-form-label">NID No.</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" name="nid"   id="Mother" placeholder="NID's No">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="Mother" class="col-sm-4 col-form-label">Villege<span style="color:red">*</span></label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" name="permanent_address"   id="Mother" placeholder="Villege name">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="Mother" class="col-sm-4 col-form-label">Post Office.<span style="color:red">*</span></label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" name="post"   id="Mother" placeholder="Post Office ">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="Mother" class="col-sm-4 col-form-label">Union<span style="color:red">*</span></label>
						<div class="col-sm-8">
						  <select class="custom-select" name="word" id="inputGroupSelect01" required="">
									<option selected>Select Your Union</option>
									<option value="হযরতপুর">হযরতপুর</option>
									<option value="কলাতিয়া">কলাতিয়া</option>
									<option value="তারানগর">তারানগর</option>
									<option value="শাক্তা">শাক্তা</option>
									<option value="রুহিতপুর">রুহিতপুর</option>
									<option value="বাস্তা">বাস্তা</option>
									<option value="কালিন্দী">কালিন্দী</option>
									<option value="জিনজিরা">জিনজিরা</option>
									<option value="শুভাঢ্যা">শুভাঢ্যা</option>
									<option value="তেঘরিয়া">তেঘরিয়া</option>
									<option value="কোন্ডা">কোন্ডা</option>
									<option value="আগানগর">আগানগর</option>
									
									
									
									
									
									
									
									
									
									
									
									
									
							  </select>
						</div>
					  </div>
					
					   
					  
					    
					
					 
					  
					  
					  
					   <div style="padding-left:0px;margin-left:0%;margin-right:px;">
					<div class="personal-info">
					   <br>
					  <h4 class="info">Registration Fee Info<sub style="color:red"> (Optional) </sub></h4>
					  <hr>
					  
					</div>

					 <div class="form-group row">
						<label for="Mother" class="col-sm-4 col-form-label">Operator</label>
						<div class="col-sm-8">
						  <select class="custom-select" name="operator"  id="inputGroupSelect01" required="">
									<option selected>Select Your Operator</option>
									<option value="bkash">Bkash</option>
									<option value="rocket">Rocket</option>
									<option value="nogod">Nogod</option>
									
									
							  </select>
						</div>
					  </div>
					  <div class="form-group row">
						<label for="Mother" class="col-sm-4 col-form-label">Bkash/Rocket/Nogod</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control"  name="number"id="Mother" placeholder=" 01XXXXXXX">
						</div>
					  </div>
					  <div class="form-group row">
						<label for="Mother" class="col-sm-4 col-form-label">Transaction Id</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" name="transid"="Mother" placeholder=" A4RFB87N">
						</div>
					  </div>
					 
					   
			    </div>
					  
					  
					  <br><br>
					  
					 <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Confirm">
					  <br><br>
				</form>
				
				
				
				
		    </div>
			<div class="col-md-4"  style="border: 1px solid;">
			
			     <div class="scholarship-winner">
				 
				 <div id="text-5" class="widget zn-sidebar-widget widget_text">
					<br>
					<h4 class="info-h" style="font-size:18px ;text-align:center;text-transform:uppercase">Last Member Info</h4>			
				    <hr>
				</div>
				
                        
                    
					<div class="card h-100 text-center">
					 @foreach($personel as $person)
						<div class="our-team">
							<img class="img-fluid" src="{{'http://dkshomiti.com/framework/storage/app/public/personel/'.$person->image}}" alt="" />
							<div class="team-content">
								<h3 class="title">{{$person->name}}</h3>
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
						<div class="about-winner">
							    <p style="text-align:justify"> {!! $person->message !!} </p>
						</div>
						@endforeach
					</div>
				
                     
                       
        
				
				
				
				 
				 </div><br><br>
				<div id="text-5" class="widget zn-sidebar-widget widget_text">
					<h4 class="info-h" style="font-size:18px">এডমিশন ফরম ফিলাপ করার প্রক্রিয়া</h4>			
				</div><br>
					<h4 class="info-h" style="font-size:16px">Bkash/Rocket/Nogod info</h4>
                <hr>
                <ol class="admission-form-ins">
				<li>BKash Number : 01813807771</li>				
				<li>Nogod Number : 01813807771</li>
				<li>Rocket Number: 01613807771</li>
				
				
				</ol>
				
				<br>
				<h4 class="info-h" style="font-size:16px">Personal info</h4>
                <hr>
				<ol class="admission-form-ins">
				<li>আপনার সাবজেক্টটি সিলেক্ট করুন</li>
				<li>আপনার নাম লিখুন</li>
				<li>আপনার ফটো সিলেক্ট করুন</li>
				<li>আপনার বাবার নাম লিখুন</li>
				<li>আপনার মায়ের নাম লিখুন</li>
				<li>আপনার জন্ম তারিখ সেট করুন</li>
				
				</ol>
				
			
			
		    </div>
	    </div>
    </div> 
</div>
<br>	
	
	
@endsection

@push('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});






$('#form-submit').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"{{ route('scholarship_store') }}",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
      swal({
		'title' : "ধন্যবাদ",
        'text'  : 'ঢাকাইয়া কেরানীগঞ্জ সমিতি',
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

 