
@extends('layouts.backend.app')

@section('title','Designation')

@push('css')


@endpush


@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Create Designation</a> </div>
  <h1> Add Designation</h1>
</div>
<div class="container-fluid">
  <hr>
  <form action="{{ route('admin.sub-tag.store') }}" method="POST" class="form-horizontal" method="POST" enctype="multipart/form-data">
    @csrf
  
  <div class="row-fluid">
    <div class=" content span6" style="width: 67%">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <a class="btn btn-success waves-effect"  href="{{ route('admin.sub-tag.index') }}">
                
                <span>All Designation</span>
            </a>
        </div>
        <div class="widget-content nopadding">
          
		  <div class="form-group">
			  <label for="usr"><b><br>Name</b></label>
			  <input type="text" name="name"  naclass="form-control" id="usr" style="width:100%">
         </div><br><br>
		    <div class="form-group">
			  <label for="usr"><b>Description</b></label>
			    <div class="message">
                        
                   <textarea  id="mytextarea" name="body"> </textarea>				
							
                </div>	  
            </div>
		  
		  
		  
		  
        </div>
      </div>
      
	  
	   
    </div>
    <div class=" others span6" style="width: 30%">
        <div class="widget-box">
        <div class="widget-title" > 
          <h5  style="text-align:center !important" >Status</h5>
        </div>
        <div class="widget-content nopadding">
			<br>
            <div class="form-group form-check">
				<label class="form-check-label">
				  <input class="form-check-input" type="checkbox" name="status" >Published
				</label>
			</div>
			
			
			
			

		  
		
		</div>
      </div>
	  
	 
 <div class="widget-box">
        <div class="widget-title" > 
          <h5  style="text-align:center !important" >Set Priority</h5>
        </div>
        <div class="widget-content nopadding">
			
            
			
			<div class="form-group">
			  
			  <input type="text" name="priority"  naclass="form-control" id="usr" style="width:100%">
            </div>
			
			

		  
		
		</div>
      </div>
       <div class="widget-box">
        <div class="widget-title"> 
          <h5>Office</h5>
        </div>
        <div class="widget-content nopadding">
         <div class="form-group form-float">
            <div class="control-group">
              
              <div class="controls">
                <select  name="tag_id" >
				   
				   @foreach($tags as $tag)
                  <option  value="{{$tag->id}}">{{$tag->name}}</option>
                   @endforeach
                </select>
              </div>
            </div>
          </div>
		 
		 
		 
		 
		 
        </div>
      </div>
	  
	  
	  
	  <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Upload Picture</h5>
        </div>
        <div class="widget-content nopadding">
          
		              <div class="control-group">
              
              <div class="controls">
                <input type="file"  name="image"/>
              </div>
            </div>
			 <div class="form-actions">
              <button type="submit" class="btn btn-success" style=" width:100%;border-radius:5px">Add Designation</button>
     
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