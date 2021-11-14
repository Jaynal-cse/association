<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Matrix Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{asset('assets')}}/backend/css/bootstrap.min.css" />
		<link rel="stylesheet" href="{{asset('assets')}}/backend/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="{{asset('assets')}}/backend/css/matrix-login.css" />
        <link href="{{asset('assets')}}/backend/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
		
<style>
.text-center {
    
    color: green;
}
</style>
    </head>
    <body>
        <div id="loginbox">            
           
            <form  action="{{route('CodeVerification')}}" class="form-vertical">
               @csrf
			   @method('PUT')
				<p class="normal_text">Enter your OTP code  below and we will send you password reset option.</p>
				
                    <div class="controls">
                        
						<div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input  type="text" name="code" placeholder="Enter OTP code" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="{{route('login')}}" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    
                    <span class="pull-right"><button type="submit"  class="btn btn-success" />Send &raquo;</button></span>
                </div>
            </form>
        </div>
        
        <script src="{{asset('assets')}}/backend/js/jquery.min.js"></script>  
        <script src="{{asset('assets')}}/backend/js/matrix.login.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		{!! Toastr::message() !!}
		<script>
			@if($errors->any())
				@foreach($errors->all() as $error)
					  toastr.error('{{ $error }}','Error',{
						  closeButton:true,
						  progressBar:true,
					   });
				@endforeach
			@endif
		</script>	
    </body>

</html>
