

@extends('layouts.backend.app')

@section('title','Category')

@push('css')
<style>


</style>
@endpush


@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">All Posts</a> </div>
    <h1>Posts<span class="badge bg-blue">{{ $posts->count() }}</span></h1>
	
  </div>
  <div class="container-fluid">
    <hr>
    
        <div class="widget-box">
          <div class="widget-title"> 
            <a class="btn btn-success waves-effect"  href="{{ route('admin.post.create') }}">
                
                <span>+ Add New Post</span>
            </a>
			<a class="btn btn-success waves-effect"  href="{{ route('admin.post.index') }}">
                
                <span>All Post</span>
            </a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th><i class="icon-eye-open" style="font-size:18px"></th>
                  <th>Is Approved</th>
                  <th>Status</th>
                  
                  <th>Action</th>
                </tr>
              </thead>
			  <tfoot>
			  <tr>
                <th>ID</th>
                  <th >Title</th>
                  <th>Author</th>
                  <th><i class="icon-eye-open"style="font-size:18px"></th>
                  <th>Is Approved</th>
                  <th>Status</th>
                  
                  <th>Action</th>
                </tr>
                                
              </tfoot>
              <tbody  
			    @foreach($posts  as $key => $post)
                <tr class="gradeX" >
                  <td style="text-align:center">{{ $key + 1 }}</td>
                  <td style="text-align:center">{{ $post->title }}</td>
                  <td style="text-align:center">{{ $post->user->name }}</td>
                  <td style="text-align:center">{{ $post->view_count }}</td>
                  <td style="text-align:center">
				  
				      @if($post->is_approved == true)
                            <span class="badge bg-blue">Approved</span>
                      @else
                            
						
						
						<button type="button"  style="background-color:##f9f9f9;border:none" onclick="approvePost({{ $post->id }})">
                            <span class="badge bg-pink">Pending</span>
                        </button>
                        <form method="post" action="{{ route('admin.post.approve',$post->id) }}" id="approval-form-{{ $post->id }}" style="display: none">
                        @csrf
                        @method('PUT')
                        </form>	
						
                      @endif
				  
				  </td>
				  <td style="text-align:center">
				  
				  
				     @if($post->status == true)
                        <span class="badge bg-blue">Published</span>
                     @else
                        <span class="badge bg-pink">Pending</span>
                     @endif
				  
				  
				  </td>
                  <td class="text-center" style="text-align:center">
				     <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-success waves-effect">
                         <i class="icon-eye-open" style="font-size:18px" ></i>
                      </a>
                     <a href="{{ route('admin.post.edit',$post->id) }}" class="btn btn-info waves-effect">
                        <i class="icon-edit"></i>
                     </a>
                     <button class="btn btn-danger waves-effect" type="button" onclick="deletePost({{ $post->id }})">
                        <i class="icon-trash"></i>
                     </button>
                     <form id="delete-form-{{ $post->id }}" action="{{ route('admin.post.destroy',$post->id) }}" method="POST" style="display: none;">
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
<script type="text/javascript">
   function approvePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You went to approve this post ",
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
                    document.getElementById('approval-form-'+id).submit();
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