
@extends('layouts.backend.app')

@section('title','Notice')

@push('css')

 

@endpush


@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Add Video</a> </div>
  <h1> Add  Video</h1>
</div>
<div class="container-fluid">
  <hr>
  <form action="{{ route('admin.video.store') }}" method="POST" class="form-horizontal" method="POST" enctype="multipart/form-data">
  @csrf
  
  <div class="row-fluid">
    <div class=" content span6" style="width: 67%">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <a class="btn btn-success waves-effect"  href="{{ route('admin.video.index') }}">
                
                <span>All Video</span>
            </a>
			
        </div>
        <div class="widget-content nopadding">
          
		  <div class="form-group">
			  <label for="usr"><b><br>Title</b></label>
			  <input type="text" name="name"  naclass="form-control" id="usr" style="width:100%">
         </div>
		   <div class="form-group">
			  <label for="usr"><b><br>Youtube Video Link</b></label>
			  <input type="text" name="link"  naclass="form-control" id="usr" style="width:100%" >
         </div><br><br>
		    <div class="form-group">
			  <label for="usr"><b>Body</b></label>
			    <div class="body">
                        
                   <textarea  id="mytextarea" name="body" disabled > </textarea>				
							
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
              <input type="checkbox"  name="status" value="1" disabled>Published
									
              
            </div>
          </div>
		  
		
		</div>
      </div>



	 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Categories</h5>
        </div>
        <div class="widget-content nopadding">
          
		  <div class="form-group form-float">
            <div class="control-group">
              
              <div class="controls">
                <select name="category" disabled>
				  @foreach($categories as $category)
                  <option  value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
		  
		  
		  
		  
        </div>
      </div>
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Tags</h5>
        </div>
        <div class="widget-content nopadding">
         <div class="form-group form-float">
            <div class="control-group">
              
              <div class="controls">
                <select multiple name="tags[]" disabled >
				 @foreach($tags as $tag)
                  <option  value="{{$tag->id}}">{{ $tag->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
		 
		 
		 
		 
		 
        </div>
      </div>
	  <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Upload Notice</h5>
        </div>
        <div class="widget-content nopadding">
          
		              <div class="control-group">
              
              <div class="controls">
                <input type="file"  name="image" disabled>
              </div>
            </div>
			 <div class="form-actions">
              <button type="submit" class="btn btn-success" style=" width:100%;border-radius:5px">Add Video</button>
     
			</div>
		  
		  
		  
		 
        </div>
      </div>
      
    </div>
  </div>
  </form>
</div>
</div>



@endsection


@push('js')

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


@endpush