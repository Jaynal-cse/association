<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>ঢাকাইয়া কেরানীগঞ্জ সমিতি</title><meta charset="UTF-8" />
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
.form-vertical, .form-actions {
   
    border-top: 1px solid #fff;
}
.bg_ly {
    background-color: #28b779;
}

</style>
    </head>
    <body style="background-color: #0000000a;margin-top: 5%;">
        <div id="loginbox" style="box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.6), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">            
            <form id="loginform" style="background-color:#fff" class="form-vertical" method="POST" action="{{url('post-login')}}">
			{{ csrf_field() }}
				 <div class="control-group normal_text" style="background-color:#fff"> <h3><img  style="max-width: 43%;"src="{{asset('assets')}}/backend/img/logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-envelope"> </i></span><input style="background-color: gray;color:#fff" type="email" name="email" placeholder="Email" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input style="background-color: gray; color:#fff" type="password"  name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    
					
					<span class="pull-right"><button type="submit"  class="btn btn-success" /> Login &raquo;</button></span>
                </div>
				<div class="text-center">If you have an account?
<a class="small" href="{{url('register')}}">Sign Up</a></div>
<hr>
 <p style="text-align:center;color:#49afcd"><em><a  style="color:#49afcd" target="_blank"href="https://payrasoft.com
">Developed By PayraSoft</a></em></p>
            </form>
            <form id="recoverform" action="{{route('reset-mail')}}" class="form-vertical">
               {{ csrf_field() }}
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input  type="email" name="email" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    
                    <span class="pull-right"><button type="submit"  class="btn btn-success" />Send Mail &raquo;</button></span>
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
