
@extends('layouts.backend.app')

@section('title','Post')

@push('css')

 <style>
.subtag{
	width:90%;
	height:29px;
	font-size:12px;
}
</style>

@endpush


@section('content')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Create Post</a> </div>
  <h1> Add Personnel</h1>
</div>
<div class="container-fluid">
  <hr>
  <form action="{{ route('admin.personel.store') }}" method="POST" class="form-horizontal" method="POST" enctype="multipart/form-data">
  @csrf
  
  
  <div class="row-fluid">
    <div class=" content span6" style="width: 67%">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <a class="btn btn-success waves-effect"  href="{{ route('admin.personel.index') }}">
                
                <span>All Personnel</span>
            </a>
        </div>
        <div class="widget-content nopadding">
          
		  <div class="form-group">
			  <label for="usr"><b><br>Name</b></label>
			  <input type="text" name="name"  naclass="form-control" id="usr" style="width:100%">
         </div><br><br>
		    <div class="form-group">
			  <label for="usr"><b>Message</b></label>
			    <div class="message">
                        
                   <textarea  id="mytextarea" name="message"> </textarea>				
							
                </div>	  
            </div>
		  
		  
		  
		  
        </div>
      </div>
      
	  
	   
    </div>
    <div class=" others span6" style="width: 30%">
        <div class="widget-box">
        <div class="widget-title" > 
          <h5  style="text-align:center !important" >Phone</h5>
        </div>
        <div class="widget-content nopadding">
			
            
			
			<div class="form-group">
			  
			  <input type="text" name="phone"  naclass="form-control" id="usr" style="width:100%">
            </div>
			
			

		  
		
		</div>
      </div>
	  
	  <div class="widget-box">
        <div class="widget-title" > 
          <h5  style="text-align:center !important" >Email</h5>
        </div>
        <div class="widget-content nopadding">
			
            
			
			<div class="form-group">
			  
			  <input type="text" name="email"  naclass="form-control" id="usr" style="width:100%">
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
                <select  id="tag_id" class="dynamic" data-dependent="subtag" >
				<option>Select Office</option>
				 @foreach($tags as $tag)
                  <option  value="{{$tag->id}}">{{ $tag->name }}</option>
                 @endforeach
                </select>
              </div>
            </div>
          </div> 
        </div>
      </div>
	  
	  <div class="widget-box">
        <div class="widget-title"> 
          <h5>Designation</h5>
        </div>
        <div class="widget-content nopadding">
         <div class="form-group form-float">
            <div class="control-group">
              
              <div class="controls" id="subtag">
                
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
              <button type="submit" class="btn btn-success" style=" width:100%;border-radius:5px">Add Personnel</button>
     
			</div>
		  
		  
		  
		 
        </div>
      </div>
	  
	  <div class="widget-box">
        <div class="widget-title" > 
          <h5  style="text-align:center !important" >Faebook Link Here</h5>
        </div>
        <div class="widget-content nopadding">
			
            
			
			<div class="form-group">
			  
			  <input type="text" name="facebook_link"  naclass="form-control" id="usr" style="width:100%">
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
	
      
    </div>
  </div>
  </form>
</div>
</div>



@endsection


@push('js')

<script>
$(document).ready(function(){ 
     
     function call_ajax(tag_id){
            
              
               var x;
               var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('admin.subtag.fetch') }}",
                    method:"POST",
				    data:{ tag_id:tag_id, _token:_token},
					
                    success:function(result)
                       {  
					       
						    myObj = JSON.parse(result);
						  
						   txt = "<select class='subtag' name='subtag_id'><option>Select Designation</option>";
							for (x in myObj) {
								
								
							       txt += "<option value="+myObj[x].id+">" + myObj[x].name +"</option>";
								
							}
							txt +="</select>"
							//alert(txt);
							document.getElementById("subtag").innerHTML = txt;

                       }

               })

            

        
      }
	  // catch subtag names in loading time tag
	  var loadingTimeTag_id = $('select[name="tags"]').val();
	 
	  //alert(personel_subtag_id);
	  
	  call_ajax(loadingTimeTag_id);
	   
	  // catch subtag names after change  tag
	  $('.dynamic').change(function(){
		     var value = $(this).val();
			 
		     call_ajax(value);
		  });
      
         		
    });





</script>
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