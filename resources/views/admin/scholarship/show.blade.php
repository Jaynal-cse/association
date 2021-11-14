
@extends('layouts.backend.app')

@section('title','Post')

@push('css')
   <style>
   
      .badge{
		  border-radius:0px;
	  }
	  
	 #show-title{
		
    padding: 16px 7px;
	

	 } 
	 .post-body{
		 padding:7px;
	 }
   </style>
 

@endpush


@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Create Post</a> </div>
  <h4 style="padding-left:21px;padding-top:10px"> Show Student Info # {{ $post->std_name}}  </h4>
</div>
<div class="container-fluid">
  <hr>
  
  
  <div class="row-fluid">
    <div class=" content span6" style="width: 67%">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <a class="btn btn-success waves-effect"  href="{{ route('admin.scholarship.index') }}">
                
                <span>All Post</span>
            </a>
			
                
                
          
        </div>
        <div class="widget-content nopadding">
          <table class="table table-hover"  >
    <thead>
      <tr >
        <th>Info Name</th>
        <th>Information</th>
        
      </tr>
    </thead>
	<tfoot >
      <tr>
        <th>Info Name</th>
        <th>Information</th>
        
      </tr>
    </tfoot>
    <tbody>
      <tr >
        <td >Scholarship Name</td>
        <td >{{$post->scholarship_name}}</td>
        
      </tr>
      <tr >
        <td>Applicant Name</td>
        <td>{{$post->std_name}}</td>
        
      </tr>
	  <tr >
        <td >Father Name</td>
        <td >{{$post->father_name}}</td>
        
      </tr>
	  <tr >
        <td >Mother Name</td>
        <td >{{$post->mother_name}}</td>
        
      </tr>
	  <tr >
        <td >Phone</td>
        <td >{{$post->phone}}</td>
        
      </tr>
	  <tr >
        <td >Email</td>
        <td >{{$post->email}}</td>
        
      </tr>
	  <tr >
        <td >Date of Birth</td>
        <td >{{$post->DOB}}</td>
        
      </tr>
	  <tr >
        <td >Present Address</td>
        <td >{{$post->present_address}}</td>
        
      </tr>
	  <tr >
        <td >Exam Name</td>
        <td >{{$post->exam_name}}</td>
        
      </tr>
	  <tr >
        <td >Group Name</td>
        <td >{{$post->group_name}}</td>
        
      </tr>
	  <tr >
        <td >Board Name</td>
        <td >{{$post->board_name}}</td>
        
      </tr>
	  <tr >
        <td >Student Roll</td>
        <td >{{$post->std_roll}}</td>
        
      </tr>
	  <tr >
        <td >Registration </td>
        <td >{{$post->std_reg}}</td>
        
      </tr>
	  <tr >
        <td >Passing Year</td>
        <td >{{$post->passing_year}}</td>
        
      </tr>
	  
      
    </tbody>
  </table>
		  
		  
		  
		  
        </div>
      </div>
      
	  
	   
    </div>
    <div class=" others span6" style="width: 30%">
           <div class="widget-box">
        <div class="widget-title" > <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5  style="text-align:center !important" >Applicant Name</h5>
        </div>
        <div class="widget-content nopadding">
			<span style="width:100%;text-transform:uppercase" class="badge badge-pill badge-danger">
				{{$post->std_name}}
			</span>
		  
		
		</div>
      </div>



	 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Result</h5>
        </div>
        <div  id="cat" class="widget-content nopadding">
                
		        
							  <span style="width:100%" class="badge badge-pill badge-danger">
							  {{$post->std_result}}
						        </span>
						 
                
				  
                
              
           
		  
		  
		  
		  
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Phone Number</h5>
        </div>
        <div class="widget-content nopadding">   
			<span  style="width:100%"class="badge badge-pill badge-danger">
				{{$post->phone}}
			</span>
        </div>
      </div>
	  <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Applicant Photo</h5>
        </div>
        <div class="widget-content nopadding">
            <img  src="{{Storage::disk('public')->url('scholarship/'.$post->image)}}">
        </div>
      </div>
      
    </div>
  </div>
  
</div>
</div>



@endsection


@push('js')
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
<script type="text/javascript">
     
        tinymce.init({
			selector:"#mytextarea",
			height: 250,
			plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
				toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
		});
      
    </script>
	<script type="text/javascript">
   function approvePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approve this post",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The post remain pending :)',
                        'info'
                    )
                }
            })
        }
    </script>    	


@endpush