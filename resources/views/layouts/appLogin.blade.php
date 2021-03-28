<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ASTUDILLO'S GROUP @yield('title')</title>
    <!-- Styles -->
   <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
   <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 </head>
 
<body>

<header class="header"> 
		<video  id="video" autoplay loop muted >
			<source src="{{ Storage::url("Header.mp4")}}" type="video/mp4">
		</video>
</header>	
		


<div  class="input-group">		
	</div>
      	<a href="{{ route('welcome') }}" >
        <img src="{{asset('images/icons/home.png')}}" width="80" ></a>
	</div>  	           
		 
	<div>
		@yield('content')       
	</div>
	     
			
    
 </div>


<footer>
  <div align="center">
    <label>
        @ (2020) todos los derechos reservados<br><br>developmentsoft2020@gmail.com
    </label>

    <label style="" >
        <a href="" ><img src="{{asset('images/icons/Facebook.png')}}" class="img-footer" ></a>
        <a href="" ><img src="{{asset('images/icons/Twitter.png')}}" class="img-footer"></a>
        <a href=""><img src="{{asset('images/icons/Messeger.png')}}" class="img-footer"></a>
    </label>
</div>
</footer>
	
	
			<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

<div>
    @yield('script')
</div>

