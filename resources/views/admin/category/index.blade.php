

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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">All Categories</a> </div>
    <h1>All Category<span class="badge bg-blue">{{ $categories->count() }}</span></h1>
	
  </div>
  <div class="container-fluid">
    <hr>
    
        <div class="widget-box">
          <div class="widget-title"> 
            <a class="btn btn-success waves-effect"  href="{{ route('admin.category.create') }}">
                
                <span>+ Add New Category</span>
            </a>
			<a class="btn btn-success waves-effect"  href="{{route('admin.sub-category.create')}}">
                
                <span>+ Add New Sub-Category</span>
            </a>
			<a class="btn btn-success waves-effect"  href="{{ route('admin.sub-category.index') }}">
                
                <span>Show All Sub-Category</span>
            </a>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Subcategories</th>
                  <th>Action(s)</th>
                </tr>
              </thead>
			  <tfoot>
			  <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Subcategories</th>
                  <th>Action(s)</th>
                </tr>
                                
              </tfoot>
              <tbody  
			    @foreach($categories  as $key => $category)
                <tr class="gradeX" >
                  <td style="text-align:center">{{ $key +1 }}</td>
                  <td style="text-align:center">{{ $category->name }}</td>
                  <td style="text-align:center"><a href="{{route('admin.category.notice',$category->id)}}"><span class="badge bg-blue">
				        <?php $TotalNumberOfSubcategories = 0; 
                         foreach($subcategories as $subcategory){
						 if($subcategory->category_id ==$category->id){
							$TotalNumberOfSubcategories = $TotalNumberOfSubcategories +1; 
						   }
                         }
						 echo $TotalNumberOfSubcategories;  ?>
				  <!--{{ $category->posts->count()}}--></span></a></td>
                  <td class="text-center" style="text-align:center">
                        <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-info waves-effect">
                            <i class="icon-edit"></i>
                        </a>
						<?php if($TotalNumberOfSubcategories == 0)  
						 {  ?>
						 <button class="btn btn-danger waves-effect" type="button" onclick="deleteCategory({{ $category->id }})">
						 <?php }else{ ?>
						 <button class="btn btn-danger waves-effect" type="button" onclick="alertCategory({{ $category->id }},{{$TotalNumberOfSubcategories}})">
						 <?php } ?>
                            <i class="icon-trash"></i>
                        </button>
                        <form id="delete-form-{{ $category->id }}" action="{{ route('admin.category.destroy',$category->id) }}" method="POST" style="display: none;">
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
        function deleteCategory(id) {
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
		
	function alertCategory(id,subcategory) {
		swal({
		  
		  text: "Delete All ("+ subcategory +") Sub category First",
		  icon: "info",
		  button: "Dismiss",
		});
	}
    </script>    
@endpush