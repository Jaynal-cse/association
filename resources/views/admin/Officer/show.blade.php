
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
  <h4 style="padding-left:21px;padding-top:10px"> Show Post # {{ $post->id}}  </h4>
</div>
<div class="container-fluid">
  <hr>
  <form action="{{ route('admin.post.store') }}" method="POST" class="form-horizontal" method="POST" enctype="multipart/form-data">
  @csrf
  
  <div class="row-fluid">
    <div class=" content span6" style="width: 67%">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <a class="btn btn-success waves-effect"  href="{{ route('admin.post.index') }}">
                
                <span>All Post</span>
            </a>
			
                
                
          
        </div>
        <div class="widget-content nopadding">
          <div id="show-title"class="widget-title" > 
          
		  <p><b style="font-size:16px;">{{$post->title}}</b><br>
		  <small>Posted By <strong> <a href="">{{ $post->user->name }}</a></strong> on {{ $post->created_at->toFormattedDateString() }}</small>
		  </p>
        </div>
		 <div class="widget-content nopadding">
			
		    <div class="post-body">
			  <p>{!! $post->body !!}</p>
			</div>
		
		</div>
		  
		  
		  
        </div>
      </div>
      
	  
	   
    </div>
    <div class=" others span6" style="width: 30%">
           <div class="widget-box">
        <div class="widget-title" > 
          <h5  style="text-align:center !important" >Published</h5>
        </div>
        <div class="widget-content nopadding">
			<div class="form-group form-float">
            <div class="control-group">
              <input type="checkbox"  name="status" value="1">Published
									
              
            </div>
          </div>
		  
		
		</div>
      </div>



	 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Categories</h5>
        </div>
        <div  id="cat" class="widget-content nopadding">
                
		        @foreach($categories as $category)
				   @foreach($post->categories as $postCategory) 
				      
					   

                          @if($postCategory->id == $category->id)
							  <span class="badge badge-pill badge-danger">
							  {{$category->name}}
						        </span>
						  @endif


					   
					 
					 
				   @endforeach
				   
				@endforeach
              
                
				  
                
              
           
		  
		  
		  
		  
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tags</h5>
        </div>
        <div class="widget-content nopadding">
         
		    @foreach($tags as $tag)
				   @foreach($post->tags as $postTag) 
				      
					   

                          @if($postTag->id == $tag->id)
							  <span class="badge badge-pill badge-danger">
							  {{$tag->name}}
						        </span>
						  @endif


					   
					 
					 
				   @endforeach
				   
				@endforeach
		 
		 
        </div>
      </div>
	  <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Feature Image</h5>
        </div>
        <div class="widget-content nopadding">
          

		   <img  src="{{Storage::disk('public')->url('post/'.$post->image)}}">
		  
		  
		 
        </div>
      </div>
      
    </div>
  </div>
  </form>
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