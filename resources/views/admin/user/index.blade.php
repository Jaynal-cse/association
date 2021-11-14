

@extends('layouts.backend.app')

@section('title','Category')

@push('css')
<style>
.icon-trash::before {
    padding: 7px;
}

</style>
@endpush


@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">All Posts</a> </div>
    <h1>Total Users<span class="badge bg-blue">{{ $posts->count() }}</span></h1>
	
  </div>
  <div class="container-fluid">
    <hr>
    
        <div class="widget-box">
          <div class="widget-title"> 
            <a class="btn btn-success waves-effect"  href="{{ route('admin.user.create') }}">
                
                <span>+ Add New User</span>
            </a>
			<a class="btn btn-success waves-effect"  href="#">
                
                <span>All Pending Post</span>
            </a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
			  <tfoot>
			  <tr>
                <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                                
              </tfoot>
              <tbody   style="font-size:12px;color:grey">  
			    @foreach($posts  as $key => $post)
                <tr class="gradeX" >
                  <td>{{$key+1}}</td>
				  <td>{{$post->name}}</td>
				  <td>{{$post->email}}</td>
				  <td style="text-align:center" >
					  @foreach($tags as $tag)
					  
					     @if($tag->id == $post->role_id)
					         {{$tag->name}}

					     @endif
					 @endforeach
					  
					  
					  
				   </td>
				  
				  
                  <td class="text-center" style="text-align:center">
				     <a href="{{ route('admin.user.show',$post->id) }}" class="btn btn-success waves-effect">
                         <i class="icon-eye-open" style="font-size:18px" ></i>
                      </a>
                     <a href="{{ route('admin.user.edit',$post->id) }}" class="btn btn-info waves-effect">
                        <i class="icon-edit"></i>
                     </a>
                     <button class="btn btn-danger waves-effect" type="button" onclick="deleteUser({{ $post->id }})">
                        <i class="icon-trash"></i>
                     </button>
                     <form id="delete-form-{{ $post->id }}" action="{{ route('admin.user.destroy',$post->id) }}" method="POST" style="display: none;">
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
        function deleteUser(id) {
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