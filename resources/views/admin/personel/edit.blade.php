
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
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Edit Personnel</a> </div>
  <h4 style="padding-left:21px;padding-top:10px"> Edit Post # {{ $personel->id}}  </h4>
</div>
<div class="container-fluid">
  <hr>
  <form action="{{ route('admin.personel.update',$personel->id) }}" method="POST" class="form-horizontal"  enctype="multipart/form-data">
  @csrf
  @method('PUT')
  
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
			  <input type="text" name="name"  naclass="form-control"  value="{{$personel->name}}"id="usr" style="width:100%">
         </div><br><br>
		    <div class="form-group">
			  <label for="usr"><b>Message</b></label>
			    <div class="body">
                        
                   <textarea  id="mytextarea"  name="message"> {{$personel->message}} </textarea>				
							
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
			  
			  <input type="text" name="phone"  naclass="form-control"  value="{{$personel->phone}}"id="usr" style="width:100%">
            </div>
			
			

		  
		
		</div>
      </div>
	  
	  <div class="widget-box">
        <div class="widget-title" > 
          <h5  style="text-align:center !important" >Email</h5>
        </div>
        <div class="widget-content nopadding">
			
            
			
			<div class="form-group">
			  
			  <input type="text" name="email" value="{{$personel->email}}" naclass="form-control" id="usr" style="width:100%">
            </div>
			
			

		  
		
		</div>
      </div>



	 
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Office</h5>
        </div>
        <div class="widget-content nopadding">
         <div class="form-group form-float {{ $errors->has('tags') ? 'focused error' : '' }}">
            <div class="control-group">
              
              <div class="controls">
                <select  name="tags" id="tag_id" class="dynamic" data-dependent="subtag" >
				   @foreach($tags as $tag)
                  <option  <?php if($tag->id == $tag_id_of_selected_tag->tag_id) { echo"selected"; }    ?>  value="{{$tag->id}}" >{{ $tag->name}}</option>
                   @endforeach
                </select>
              </div>
            </div>
          </div>
		 
		 
		 
		 
		 
        </div>
      </div>
	  
	  
	        <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Designation</h5>
        </div>
        <div class="widget-content nopadding">
         <div class="form-group form-float ">
            <div class="control-group">
              
              <div class="controls" id="subtag" >
                
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
              <button type="submit" class="btn btn-success" style=" width:100%;border-radius:5px">Update Personel</button>
     
			</div>
		  
		  
		  
		 
        </div>
      </div>
	  
	   <div class="widget-box">
        <div class="widget-title" > 
          <h5  style="text-align:center !important" >Faebook Link Here</h5>
        </div>
        <div class="widget-content nopadding">
			
            
			
			<div class="form-group">
			  
			  <input type="text" name="facebook_link" value={{$personel->facebook_link}} naclass="form-control" id="usr" style="width:100%">
            </div>
			
			

		  
		
		</div>
      </div>
	  <div class="widget-box">
        <div class="widget-title" > 
          <h5  style="text-align:center !important" >Set Priority</h5>
        </div>
        <div class="widget-content nopadding">
			
            
			
			<div class="form-group">
			  
			  <input type="text" name="priority" value={{$personel->priority}} naclass="form-control" id="usr" style="width:100%">
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
<script>
$(document).ready(function(){ 
     
     function call_ajax(tag_id,personel_id,personel_subtag_id){
            
              
               var x;
               var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('admin.subtag.fetch') }}",
                    method:"POST",
				    data:{ tag_id:tag_id, personel_id:personel_id, _token:_token},
					
                    success:function(result)
                       {  
					       
						    myObj = JSON.parse(result);
						  
						   txt = "<select  class='subtag' name='subtag_id' >";
							for (x in myObj) {
								
								if(myObj[x].id == personel_subtag_id )
								{
								   txt += "<option  selected value="+myObj[x].id+">" + myObj[x].name +"</option>";	
								}else {
							       txt += "<option value="+myObj[x].id+">" + myObj[x].name +"</option>";
								}
							}
							txt +="</select>";
							//alert(txt);
							document.getElementById("subtag").innerHTML = txt;

                       }

               })

            

        
      }
	  // catch subtag names in loading time tag
	  var loadingTimeTag_id = $('select[name="tags"]').val();
	  var  personel_id = "<?php echo $personel->id;?>";
	  var personel_subtag_id =  "<?php echo $personel->subtag_id;?>";
	  //alert(personel_subtag_id);
	  
	  call_ajax(loadingTimeTag_id,personel_id,personel_subtag_id);
	   
	  // catch subtag names after change  tag
	  $('.dynamic').change(function(){
		     var value = $(this).val();
			 
		     call_ajax(value,personel_id,personel_subtag_id);
		  });
      
         		
    });


</script>
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