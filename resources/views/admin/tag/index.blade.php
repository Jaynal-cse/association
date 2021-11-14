

@extends('layouts.backend.app')

@section('title','Desigantion')

@push('css')
<style>
.btn {
    
    line-height: 26px;
    
}

</style>
@endpush


@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">All Offices</a> </div>
    <h1>All Office<span class="badge bg-blue">{{ $tags->count() }}</span></h1>
	
  </div>
  <div class="container-fluid">
    <hr>
    
        <div class="widget-box">
          <div class="widget-title"> 
            <a class="btn btn-success waves-effect"  href="{{ route('admin.tag.create') }}">
                
                <span>+ Add New Office</span>
            </a>
			<a class="btn btn-success waves-effect"  href="{{route('admin.sub-tag.create')}}">
                
                <span>+ Add New Designation</span>
            </a>
			<a class="btn btn-success waves-effect"  href="{{ route('admin.sub-tag.index') }}">
                
                <span>Show All Designation</span>
            </a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Designations</th>
                  <th>Action(s)</th>
                </tr>
              </thead>
			  <tfoot>
			  <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Designations</th>
                  <th>Action(s)</th>
                </tr>
                                
              </tfoot>
              <tbody  
			    @foreach($tags  as $key => $tag)
                <tr class="gradeX" >
                  <td style="text-align:center">{{ $key +1 }}</td>
                  <td style="text-align:center">{{ $tag->name }}</td>
                  <td style="text-align:center"><a href="{{route('admin.tag.notice',$tag->id)}}"><span class="badge bg-blue">
				        <?php $TotalNumberOfSubtags = 0; 
                         foreach($subtags as $subtag){
						 if($subtag->tag_id ==$tag->id){
							$TotalNumberOfSubtags = $TotalNumberOfSubtags +1; 
						   }
                         }
						 echo $TotalNumberOfSubtags;  ?>
				         </span></a></td>
						
                  <td class="text-center" style="text-align:center">
                        <a href="{{ route('admin.tag.edit',$tag->id) }}" class="btn btn-info waves-effect">
                            <i class="icon-edit"></i>
                        </a>
						<?php if($TotalNumberOfSubtags == 0)  
						 {  ?>
						 <button class="btn btn-danger waves-effect" type="button" onclick="deleteTag({{ $tag->id }})">
						 <?php }else{ ?>
						 <button class="btn btn-danger waves-effect" type="button" onclick="alertTag({{ $tag->id }},{{$TotalNumberOfSubtags}})">
						 <?php } ?>
                            <i class="icon-trash"></i>
                        </button>
                        <form id="delete-form-{{ $tag->id }}" action="{{ route('admin.tag.destroy',$tag->id) }}" method="POST" style="display: none;">
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
        function deleteTag(id) {
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
		
	function alertTag(id,subtag) {
		swal({
		  
		  text: "Delete All ("+ subtag +") Sub category First",
		  icon: "info",
		  button: "Dismiss",
		});
	}
    </script>    
@endpush