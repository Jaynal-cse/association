

@extends('layouts.backend.app')

@section('title','Category')

@push('css')

<style>
.dataTables_paginate {
    line-height: 27px;
    text-align: center;
    margin-top: 0px;
    margin-right: 0px;
    color: green;
    background: gainsboro;
}
a:not([href]) {
    
    padding: 0px 8px;
}
.modal{
	height:560px;
}
.icon-trash::before {
    padding: 5px;
}
</style>
@endpush


@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">All Applications</a> </div>
    <h1>Applications<span  id="numberOfApplicant" class="badge bg-blue"></span></h1>
	
  </div>
  <div class="container-fluid">
    <hr>
    
        <div class="widget-box">
          <div class="widget-title"> 
            <a class="btn btn-success waves-effect"  href="#">
                
                <span>All Applicant</span>
            </a>
			
          </div>
          <div class="widget-content nopadding">
            <table id="contact-table" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>                 
                  <th>Phone</th>
				  <th>Father'Name</th>
				   <th>Permanent Adress</th>
				  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
			  <tfoot>
			  <tr>
                  <th>ID</th>
                  <th>Name</th>                 
                  <th>Phone</th>
				  <th>Father'Name</th>
				   <th>Permanent Adress</th>
				  <th>Date</th>
                  <th>Action</th>
                </tr>
                                
              </tfoot>
              <tbody > 
			   
                
              </tbody>
			                
            </table>
          </div>
        </div>
		
		
		
		
      </div>
  
</div>




<div class="modal fade" id="single-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="margin-top: 68px; margin-bottom:20px">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">   </h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
         <ul class="list-group">
             <li class="list-group-item" > Name: <span class="text-danger" id="contactname"> </span> </li>
			 <li class="list-group-item" > Phone: <span class="text-danger" id="contactnumber"> </span> </li>
             <li class="list-group-item" > Email: <span class="text-danger" id="contactemail"> </span> </li>
             <li class="list-group-item" > Father's Name:<span class="text-danger" id="contactfather"> </span> </li>
			 <li class="list-group-item" > Mother's Name:<span class="text-danger" id="contactmother"> </span> </li>
			 <li class="list-group-item" > Date of Birth:<span class="text-danger" id="contactdob"> </span> </li>
			 <li class="list-group-item" > Union:<span class="text-danger" id="contactnid"> </span> </li>
			 <li class="list-group-item" >Application Date:<span class="text-danger" id="contactdate"> </span> </li>
          
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button"   class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
 <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">

      
	   
	   var table1 = $('#contact-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('admin.scholarship.data')}}",
            "columns":[
			//add serial number not id number.if we want to use id number then we remove addIndexColumn() from controller and here we use {"data":"id"}
               { "data": 'DT_RowIndex', 'orderable': true, 'searchable': false},
                { "data": "name" },
				{ "data": "phone" },
                { "data": "fname" },
                { "data": "permanent_address" },                
                
				{ "data": "created_at",
				  "render": function(jsonDate){
					  var x=new Date(jsonDate);
					  var y=calculateDate(x);
					   return y;
				     }
				  },
                { "data": "action", orderable:false, searchable: false}
            ],
			"bDestroy": true,
			
        });			
		
		
    
	 function aaaaaa(){
		    $.ajax({
                url : "{{url('/admin/data/all')}}" ,
				type : "GET",
                dataType : "JSON",
                success: function(data){
					   
					   $('#numberOfApplicant').text(data);
                       
                     }
                

             });
	 }
		
		
		
		function showData($id){
            $.ajax({
                url : "{{url('/admin/registration')}}" + '/' + $id ,
				type : "GET",
                dataType : "JSON",
                success: function(data){
					    
					    $('#single-data').modal('show');
                        $('.modal-title').text(data.name+ ' '+ 'informations');
						$('#contactname').text(data.name);
						$('#contactnumber').text(data.phone);
						$('#contactemail').text(data.email);
						$('#contactfather').text(data.fname);
						$('#contactmother').text(data.mname);
						$('#contactdob').text(data.DOB);
						
						$('#contactnid').text(data.word);
						var x = new Date(data['created_at']);
						var y=calculateDate(x);				
						$('#contactdate').text(y);
                         
                     },
                error : function(){
                             alert($id);
                         }

             });
 

     }
	 
	 
	 function deleteData($id){
		     swal({
		     title: 'Are you sure?',
		     text: "You won't be able to revert this!",
		     type: 'warning',
		     showCancelButton: true,
		     confirmButtonColor: '#3085d6',
		     cancelButtonColor: '#d33',
		     confirmButtonText: 'Yes, delete it!',
		     showLoaderOnConfirm: true,    
		     preConfirm: function() {
			 return new Promise(function(resolve) {				  
					  $.ajax({
							url : "{{url('/admin/application')}}" + '/' + $id ,
							type: "POST",
							data : {'_method' : 'DELETE' , '_token' : "{{csrf_token()}}"} ,
							dataType: 'json',
							success:function(data){
								table1.ajax.reload();
								aaaaaa();
   								swal({
								    title : 'Delete Done!',
								    text  : 'You Clicked the button!',
								    con  : 'success',
								    buttion: 'Done'
								    });
								},
							error : function(){
								swal({
									title : 'Opssss..',
									text  : data.message,
									type  : 'error',
									timer : '1500',

									});
								}
							});			  
			        });
			  },
		   allowOutsideClick: false     
		});
	}
		
	
	    function calculateDate(x){
			     var monthName ="";
			     var monthDeceimel =x.getMonth() +1; 
				 if(monthDeceimel ==1)
					 { monthName ="Jan";}
				  else if(monthDeceimel ==2)
				     { monthName ="Feb";}
				  else if(monthDeceimel ==3)
				     { monthName ="Mar";}
			      else if(monthDeceimel ==4)
					{ monthName ="Apr";}
				  else if(monthDeceimel ==5)
					{ monthName ="May";}
				  else if(monthDeceimel ==6)
				    { monthName ="Jun";}
			      else if(monthDeceimel ==7)
				    { monthName ="Jul";}
				  else if(monthDeceimel ==8)
				     { monthName ="Aug";}
				  else if(monthDeceimel ==9)
				     { monthName ="Sep";}
				  else if(monthDeceimel ==10)
				     { monthName ="Oct";}
				  else if(monthDeceimel ==11)
					 { monthName ="Nov";}
				   else if(monthDeceimel ==12)
				     { monthName ="Dec";}
				    var y =monthName +' '+ x.getDate() + ', '+x.getFullYear();
		            return y;
	}
	
	
    </script>    
@endpush/; 