

@extends('layouts.backend.app')

@section('title','Settings')

@push('css')


<style>
body {
    background:#2e363f;
}
 .mt-5{
    margin-top: 0rem !important;
}



</style>
@endpush


@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Settings</a> </div>
    <h1>Profile Settings</h1>
	
  </div>
  <div class="container-fluid">
    <hr>
    
        <div class="widget-box">
          
          <div class="widget-content nopadding">
            <table class="">
              
<div class="container rounded  mt-5 mb-5">
    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" src="{{Storage::disk('public')->url('profile/'.$user->image)}}"><span class="font-weight-bold">{{$user->name}}</span><span class="text-black-50">{{$user->email}}<span><span> </span></div>
             <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value="" disabled></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value="" disabled></div>
                
			</div>

        </div>
        <div class="col-md-8 border-right" style="max-width:47%" >
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text"  name="name" class="form-control" placeholder="Name" value="{{$user->name}}"></div>
                    <div class="col-md-6"><label class="labels">Username</label><input type="text" class="form-control" value="" placeholder="Username" disabled></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">PhoneNumber</label><input type="text" class="form-control" placeholder="enter phone number" value="" disabled></div>
                    <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address" value="" disabled></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" name="email" placeholder="Email id" value="{{$user->email}}"></div>
                    <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value="" disabled></div>
					
					<div class="col-md-12"><label class="labels">Update Photo</label>
                   <div class="custom-file">
    <input type="file"   class="custom-file-input" id="customFile" name="image">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div></div>
			   </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="" disabled></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state" disabled></div>
                </div>
                <div class="mt-5 text-center"><button type="submit" class="btn btn-primary">Save Profile</button></div>
            </div>
        </div>
        
    </div>
  </div>
 </div>
 </form>
</div>
				 
				 
				 
				 
            </table>
          </div>
        </div>
		
		
		
		
      </div>
</div>
 



@endsection

@push('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
        function deletePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>    
@endpush