<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>ঢাকাইয়া কেরানীগঞ্জ সমিতি </title>
	<!-- Bootstrap core CSS -->
    
	<link href="{{asset('assets')}}/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Fontawesome CSS -->
	<link href="{{asset('assets')}}/frontend/css/all.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="{{asset('assets')}}/frontend/css/owl.carousel.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link href="{{asset('assets')}}/frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<!-- Owl Carousel CSS -->
	<link href="{{asset('assets')}}/frontend/css/jquery.fancybox.min.css" rel="stylesheet">
	<link href="{{asset('assets')}}/frontend/css/theme_yc.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Custom styles for this template -->
	<link href="{{asset('assets')}}/frontend/css/style.css" rel="stylesheet">
	<link href="{{asset('assets')}}/frontend/css/mycss.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @stack('css')
   <style>
   .plc .form-control::placeholder {
    color: #663399a3;
    
}
   .footer_ul_amrc li a{
	   color:#663399a3;
   }
   
   .logo span{
	   display:none;
   }
   @media only screen and (max-width: 992px) {
	   .header{
		   padding-top:10px;
		   background-color: #fff;
		   height: 50px;
		   box-shadow: 5px 10px 8px #888888;
	   }
	   .logo span{
	   display:block;
   }
   .logo_image{
	   display:none;
   }
   } 
   .navbar {
  padding: 0;
}

.navbar ul {
  margin-left: -3.5%;
  margin-right:3.5%;
  padding: 0;
  display: flex;
  list-style: none;
  align-items: center;
}

.navbar li {
  position: relative;
}

.navbar a, .navbar a:focus {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 0 10px 30px;
  font-family: "Nunito", sans-serif;
  font-size: 15px;
font-weight: 400;
  color: #013289;
  white-space: nowrap;
  transition: 0.3s;
  background-color: #fff;
 
}

.navbar a i, .navbar a:focus i {
  font-size: 12px;
  line-height: 0;
  margin-left: 5px;
}

.navbar a:hover, .navbar .active, .navbar .active:focus, .navbar li:hover > a {
  color: #4154f1;
}

.navbar .dropdown ul a:hover {
    font-size: 17px;
    
}
.navbar a:hover {
    
    font-size: 17px;
    font-weight: 400;
    
}
.navbar .getstarted {
  background: #4154f1;
  padding: 8px 20px;
  margin-left: 30px;
  border-radius: 4px;
  color: #fff;
}

.navbar .getstarted:hover {
  color: #fff;
  background: #5969f3;
}

.navbar .dropdown ul {
  display: block;
  position: absolute;
  left: 14px;
  top: calc(100% + 30px);
  margin: 0;
  padding: 10px 0;
  z-index: 99;
  opacity: 0;
  visibility: hidden;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
  transition: 0.3s;
  border-radius: 4px;
}

.navbar .dropdown ul li {
  min-width: 200px;
}

.navbar .dropdown ul a {
  padding: 10px 20px;
  font-size: 15px;
  text-transform: none;
  font-weight: 600;
}

.navbar .dropdown ul a i {
  font-size: 12px;
}

.navbar .dropdown ul a:hover, .navbar .dropdown ul .active:hover, .navbar .dropdown ul li:hover > a {
  color: #4154f1;
}

.navbar .dropdown:hover > ul {
  opacity: 1;
  top: 100%;
  visibility: visible;
}

.navbar .dropdown .dropdown ul {
  top: 0;
  left: calc(100% - 30px);
  
}

.navbar .dropdown .dropdown:hover > ul {
  opacity: 1;
  top: 0;
  left: 100%;
  visibility: visible;
}

@media (max-width: 1366px) {
  .navbar .dropdown .dropdown ul {
    left: -90%;
  }
  .navbar .dropdown .dropdown:hover > ul {
    left: -100%;
  }
}
/**
* Mobile Navigation 
*/
.mobile-nav-toggle {
  color: #012970;
  font-size: 28px;
  cursor: pointer;
  display: none;
  line-height: 0;
  transition: 0.5s;
}

.mobile-nav-toggle.bi-x {
  color: #fff;
}

@media (max-width: 991px) {
  .mobile-nav-toggle {
    display: block;
  }
  .navbar ul {
    display: none;
  }
}

.navbar-mobile {
  position: fixed;
  overflow: hidden;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  background: rgba(1, 22, 61, 0.9);
  transition: 0.3s;
}

.navbar-mobile .mobile-nav-toggle {
  position: absolute;
  top: 15px;
  right: 15px;
}

.navbar-mobile ul {
  display: block;
  position: absolute;
  top: 55px;
  right: 15px;
  bottom: 15px;
  left: 15px;
  padding: 10px 0;
  border-radius: 10px;
  background-color: #fff;
  overflow-y: auto;
  transition: 0.3s;
}

.navbar-mobile a {
  padding: 10px 20px;
  font-size: 15px;
  color: #012970;
}

.navbar-mobile a:hover, .navbar-mobile .active, .navbar-mobile li:hover > a {
  color: #4154f1;
}

.navbar-mobile .getstarted {
  margin: 15px;
}

.navbar-mobile .dropdown ul {
  position: static;
  display: none;
  margin: 10px 20px;
  padding: 10px 0;
  z-index: 99;
  opacity: 1;
  visibility: visible;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
}

.navbar-mobile .dropdown ul li {
  min-width: 200px;
}

.navbar-mobile .dropdown ul a {
  padding: 10px 20px;
}

.navbar-mobile .dropdown ul a i {
  font-size: 12px;
}

.navbar-mobile .dropdown ul a:hover, .navbar-mobile .dropdown ul .active:hover, .navbar-mobile .dropdown ul li:hover > a {
  color: #4154f1;
}

.navbar-mobile .dropdown > .dropdown-active {
  display: block;
}






   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}


.bg-light {
    background-color: green !important;
}

.mce-ico {
    
    height: 20px !important;
   
}
p {
   
    color: gray;
    font-family: robotoo;
}

</style>
@stack('css')
</head>
<body>
<div class="wrapper-main bangla-font" style="font-family:Roboto">
	
	
	
	@include('layouts.frontend.partial.header')

	 @yield('content')
    <!-- /.container -->
    <!--footer starts from here-->
	@include('layouts.frontend.partial.footer')
    
</div>

<!-- Bootstrap core JavaScript -->


<!-- Popper JS -->


<!-- Latest compiled JavaScript -->

<script src="{{asset('assets')}}/frontend/vendor/jquery/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('assets')}}/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets')}}/frontend/js/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('assets')}}/frontend/js/isotope.pkgd.min.js"></script>
<script src="{{asset('assets')}}/frontend/js/filter.js"></script>
<script src="{{asset('assets')}}/frontend/js/jquery.appear.js"></script>
<script src="{{asset('assets')}}/frontend/js/timeline.min.js"></script>
<script src="{{asset('assets')}}/frontend/js/owl.carousel.min.js"></script>
<script src="{{asset('assets')}}/frontend/js/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
<script src="{{asset('assets')}}/frontend/js/theme_yc.js"></script>
<script src="{{asset('assets')}}/frontend/js/script.js"></script>



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

<script>
		timeline(document.querySelectorAll('.timeline'), {
			forceVerticalMode: 700,
			mode: 'horizontal',
			verticalStartPosition: 'left',
			visibleItems: 4
		});
</script>


<script src="{{asset('assets')}}/frontend/js/navbar.js"></script>
<script>
   AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      
    });
</script>
 @stack('js') 	 
</body>
</html>