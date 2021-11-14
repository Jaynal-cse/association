
@extends('layouts.backend.app')

@section('title','Post')

@push('css')

 

@endpush


@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Create Post</a> </div>
  <h4 style="padding-left:21px;padding-top:10px"> Edit Post # {{ $post->id}}  </h4>
</div>
<div class="container-fluid">
  <hr>
  <form action="{{ route('admin.post.update',$post->id) }}" method="POST" class="form-horizontal" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  
  <div class="row-fluid">
    <div class=" content span6" style="width: 67%">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <a class="btn btn-success waves-effect"  href="{{ route('admin.post.index') }}">
                
                <span>All Post</span>
            </a>
        </div>
        <div class="widget-content nopadding">
          
		  <div class="form-group">
			  <label for="usr"><b><br>Title</b></label>
			  <input type="text" name="title"  naclass="form-control"  value="{{$post->title}}"id="usr" style="width:100%">
         </div><br><br>
		    <div class="form-group">
			  <label for="usr"><b>Body</b></label>
			    <div class="body">
                        
                   <textarea  id="mytextarea"  name="body"> {{$post->body}} </textarea>				
							
                </div>	  
            </div>
		  
		  
		  
		  
        </div>
      </div>
      
	  
	   
    </div>
    <div class=" others span6" style="width: 30%">
           <div class="widget-box">
        <div class="widget-title" > 
          <h5  style="text-align:center !important"  >Published</h5>
        </div>
        <div class="widget-content nopadding">
			<div class="form-group form-float">
            <div class="control-group">
              <input type="checkbox"  name="status" value="1" {{ $post->status == true ? 'checked' : '' }}>Published
									
              
            </div>
          </div>
		  
		
		</div>
      </div>



	 <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Categories</h5>
        </div>
        <div class="widget-content nopadding">
          
		  <div class="form-group form-float {{ $errors->has('categories') ? 'focused error' : '' }}">
            <div class="control-group">
              
              <div class="controls">
                <select name="categories[]" multiple  >
				  @foreach($categories as $category)
                  <option @foreach($post->categories as $postCategory)
                             {{ $postCategory->id == $category->id ? 'selected' : '' }}
                          @endforeach 
						  value="{{$category->id}}">{{$category->name}}</option>
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
         <div class="form-group form-float {{ $errors->has('tags') ? 'focused error' : '' }}">
            <div class="control-group">
              
              <div class="controls">
                <select multiple name="tags[]" >
				 @foreach($tags as $tag)
                  <option   
				        @foreach($post->tags as $postTag)
                          {{ $postTag->id == $tag->id ? 'selected' :'' }}
                        @endforeach
				  
				  value="{{$tag->id}}">{{ $tag->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
		 
		 
		 
		 
		 
        </div>
      </div>
	  <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5> Update Picture</h5>
        </div>
        <div class="widget-content nopadding">
          
		              <div class="control-group">
              
              <div class="controls">
                <input type="file"  name="image"/>
              </div>
            </div>
			 <div class="form-actions">
              <button type="submit" class="btn btn-success" style=" width:100%;border-radius:5px">Edit Post</button>
     
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