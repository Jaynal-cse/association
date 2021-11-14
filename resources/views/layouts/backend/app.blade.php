

<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('/favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')-{{ config('app.name', 'Laravel') }}</title> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="{{asset('assets')}}/backend/css/bootstrap.min.css" />
	<link rel="stylesheet" href="{{asset('assets')}}/backend/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="{{asset('assets')}}/backend/css/uniform.css" />
	<link rel="stylesheet" href="{{asset('assets')}}/backend/css/select2.css" />
	<link rel="stylesheet" href="{{asset('assets')}}/backend/css/fullcalendar.css" />
	<link rel="stylesheet" href="{{asset('assets')}}/backend/css/matrix-style.css" />
	<link rel="stylesheet" href="{{asset('assets')}}/backend/css/matrix-media.css" />
	<link href="{{asset('assets')}}/backend/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('assets')}}/backend/css/jquery.gritter.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">	
    <link rel="stylesheet" href="{{asset('assets')}}/backend/css/main-style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
	
	tbody{
		font-size:12px;
		color:grey;
	}
	    .icon-trash::before {
   
    padding: 7px;
}

.icon-eye-open::before {
  
    padding: 4px;
}
.btn {
    
    line-height: 26px;
    
}
.badge {
    padding-right: 14px;
    padding-left: 12px;
    
    padding-top: 5px;
    padding-bottom: 7px;
}
div.uploader span.action {
    width: 106px !important;

}
.mce-ico {
    
    height: 20px !important;
   
}

	</style>
	
	
	@stack('css')	
	</head>
	<body>
	    
	 @include('layouts.backend.partial.topbar')
	 
	 @include('layouts.backend.partial.sidebar')
	 
     @yield('content')
	 
	 @include('layouts.backend.partial.footer')

<script src="{{asset('assets')}}/backend/js/excanvas.min.js"></script> 
<script src="{{asset('assets')}}/backend/js/jquery.min.js"></script> 
<script src="{{asset('assets')}}/backend/js/jquery.ui.custom.js"></script>
<script src="{{asset('assets')}}/backend/js/bootstrap.min.js"></script> 
<script src="{{asset('assets')}}/backend/js/jquery.flot.min.js"></script> 
<script src="{{asset('assets')}}/backend/js/jquery.flot.resize.min.js"></script> 
<script src="{{asset('assets')}}/backend/js/jquery.peity.min.js"></script> 
<script src="{{asset('assets')}}/backend/js/fullcalendar.min.js"></script> 

<script src="{{asset('assets')}}/backend/js/matrix.js"></script>
<script src="{{asset('assets')}}/backend/js/matrix.chat.js"></script>
<script src="{{asset('assets')}}/backend/js/jquery.validate.js"></script>  
<script src="{{asset('assets')}}/backend/js/matrix.form_validation.js"></script> 
<script src="{{asset('assets')}}/backend/js/jquery.wizard.js"></script> 
<script src="{{asset('assets')}}/backend/js/jquery.uniform.js"></script>
<script src="{{asset('assets')}}/backend/js/select2.min.js"></script>
<script src="{{asset('assets')}}/backend/js/matrix.popover.js"></script> 
<script src="{{asset('assets')}}/backend/js/jquery.dataTables.min.js"></script> 
<script src="{{asset('assets')}}/backend/js/matrix.tables.js"></script> 
    
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
	
 
@stack('js')
	</body>
	</html>
