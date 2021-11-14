

@extends('layouts.backend.app')

@section('title','Notice')

@push('css')
<style>


</style>
@endpush


@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">All Posts</a> </div>
    <h1>Gallery<span class="badge bg-blue">{{ $posts->count() }}</span></h1>
	
  </div>
  <div class="container-fluid">
    <hr>
    
        <div class="widget-box">
          <div class="widget-title"> 
		    
            <a class="btn btn-success waves-effect"  href="{{ route('admin.gallery.create') }}">
                
                <span>+ Add New Picture</span>
            </a>
			<a class="btn btn-success waves-effect"  href="{{ route('admin.gallery.index') }}">
                
                <span>All Picture </span>
            </a>
		
			
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
				  <th>Photo</th>
                  <th>Action</th>
                </tr>
              </thead>
			  <tfoot>
			  <tr>
                <th>ID</th>
                <th>Title</th>
				 <th>Photo</th>
                <th>Action</th>
              </tr>
                                
              </tfoot>
              <tbody  
			    @foreach($posts  as $key => $post)
                <tr class="gradeX" >
                  <td style="text-align:center">{{ $key + 1 }}</td>
                  <td style="text-align:center">{{ str_limit($post->name,'10') }}</td>
                  <td style="text-align:center"> 
                       <img  height="100px" width="100px"src="{{'http://dkshomiti.com/framework/storage/app/public/gallery/'.$post->image}}">
				  </td>
                
                  <td class="text-center" style="text-align:center">
				     
                     
                     <button class="btn btn-danger waves-effect" type="button" onclick="deleteNotice({{ $post->id }})">
                        <i class="icon-trash"></i>
                     </button>
                     <form id="delete-form-{{ $post->id }}" action="{{ route('admin.gallery.destroy',$post->id) }}" method="POST" style="display: none;">
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
        function deleteNotice(id) {
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