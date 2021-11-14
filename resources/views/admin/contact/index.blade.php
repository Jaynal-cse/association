

@extends('layouts.backend.app')

@section('title','Contact')

@push('css')
<style>


</style>
@endpush


@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">All Message</a> </div>
    <h1>Message<span class="badge bg-blue">{{ $contacts->count() }}</span></h1>
	
  </div>
  <div class="container-fluid">
    <hr>
    
        <div class="widget-box">
          <div class="widget-title"> 
            
			
			<a class="btn btn-success waves-effect"  href="{{route('admin.contact.index')}}">
                
                <span>All Message</span>
            </a>
			<a class="btn btn-success waves-effect"  href="{{route('admin.donation.contact')}}">
                
                <span>Donation</span>
            </a>
			<a class="btn btn-success waves-effect"  href="{{route('admin.shareexperience.contact')}}">
                
                <span>Share Experience</span>
            </a><a class="btn btn-success waves-effect"  href="{{route('admin.scholarshipsponsor.contact')}}">
                
                <span>Sponsor a Scholarship</span>
            </a><a class="btn btn-success waves-effect"  href="{{route('admin.connect.contact')}}">
                
                <span>Connect with Community</span>
            </a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
				  <th>Type</th>
				  <th>Phone Number</th>
				  <th>Email</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
              </thead>
			  <tfoot>
			  <tr>
                  <th>ID</th>
                  <th>Name</th>
				  <th>Type</th>
				  <th>Phone Number</th>
				  <th>Email</th>
                  <th>Message</th>
                  <th>Action</th>
                </tr>
                                
              </tfoot>
              <tbody  
			    @foreach($contacts  as $key => $contact)
                <tr class="gradeX" >
                  <td style="text-align:center">{{ $key + 1 }}</td>
                  <td style="text-align:center">{{ $contact->name }}</td>
				  <td style="text-align:center">{{ $contact->connect_type }}</td>
                  <td style="text-align:center">{{ $contact->phn }}</td>
				  <td style="text-align:center">{{ $contact->email }}</td>
                  <td style="text-align:center">{{ str_limit($contact->body,'10') }}</td>
				  
                  <td class="text-center" style="text-align:center">
				     <a href="{{ route('admin.contact.show',$contact->id) }}" class="btn btn-success waves-effect">
                         <i class="icon-eye-open" style="font-size:18px" ></i>
                      </a>
                     
                     <button class="btn btn-danger waves-effect" type="button" onclick="deletePost({{ $contact->id }})">
                        <i class="icon-trash"></i>
                     </button>
                     <form id="delete-form-{{ $contact->id }}" action="{{ route('admin.contact.destroy',$contact->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                      </form>
                 </td>
                </tr>
               @endforeach
                
              </tbody>
			                
            </table>
          </div>
        </div>
		
		
		
		
      </div>
</div>
 



@endsection

@push('js')
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