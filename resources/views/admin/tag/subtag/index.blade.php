

@extends('layouts.backend.app')

@section('title','Category')

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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">All Designations</a> </div>
    <h1> All Designations<span class="badge bg-blue">{{ $subtags->count() }}</span></h1>
	
  </div>
  <div class="container-fluid">
    <hr>
    
        <div class="widget-box">
          <div class="widget-title"> 
		  <a class="btn btn-success waves-effect"  href="{{ route('admin.tag.index') }}">
                
                <span>Show All Office</span>
            </a>
			<a class="btn btn-success waves-effect"  href="{{ route('admin.tag.create') }}">
                
                <span>+Add Office</span>
            </a>
            <a class="btn btn-success waves-effect"  href="{{ route('admin.sub-tag.create') }}">
                
                <span>+ Add New Designation</span>
            </a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
				  <th>Personels</th>
                  <th>Office</th>
                  <th>Action(s)</th>
                </tr>
              </thead>
			  <tfoot>
			  <tr>
                  <th>ID</th>
                  <th>Name</th>
				  <th>Personels</th>
                  <th>Office</th>
                  <th>Action(s)</th>
                </tr>
                                
              </tfoot>
              <tbody  
			    @foreach($subtags  as $key => $subtag)
                <tr class="gradeX" >
                  <td style="text-align:center">{{ $key +1 }}</td>
                  <td style="text-align:center">{{ $subtag->name }}</td>
                  <td style="text-align:center"><a href="{{route('admin.subtag.personel',$subtag->id)}}"><span class="badge bg-blue">
				        <?php $TotalNumberOfPersonelofThesSubcategories = 0; 
                         foreach($personels as $personel){
						 if($personel->subtag_id == $subtag->id){
							$TotalNumberOfPersonelofThesSubcategories = $TotalNumberOfPersonelofThesSubcategories +1; 
						   }
                         }
						 echo $TotalNumberOfPersonelofThesSubcategories ;  ?>
				  <!----></span></a></td>
                  <td style="text-align:center">
				        @foreach($tags as $tag)
					 
					
				          @if($tag->id == $subtag->tag_id)
						  {{ $tag->name}}
						  @endif
				      @endforeach
 
					  
				  </td>
				  
                  <td class="text-center" style="text-align:center">
                        <a href="{{ route('admin.sub-tag.edit',$subtag->id) }}" class="btn btn-info waves-effect">
                            <i class="icon-edit"></i>
                        </a>
						
						<?php if($TotalNumberOfPersonelofThesSubcategories == 0)  
						 {  ?>
						 <button class="btn btn-danger waves-effect" type="button" onclick="deleteSubTag({{$subtag->id }})">
						 <?php }else{ ?>
						 <button class="btn btn-danger waves-effect" type="button" onclick="alertSubTag({{ $subtag->id }},{{$TotalNumberOfPersonelofThesSubcategories}})">
						 <?php } ?>
                            <i class="icon-trash"></i>
                        </button>
                        <form id="delete-form-{{ $subtag->id }}" action="{{ route('admin.sub-tag.destroy',$subtag->id) }}" method="POST" style="display: none;">
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
        function deleteSubTag(id) {
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
		
		function alertSubTag(id,personels) {
		swal({
		  
		  text: "Delete All ("+ personels +") Personel First",
		  icon: "info",
		  button: "Dismiss",
		});
	}
    </script>    
@endpush