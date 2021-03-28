<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--meta para adaptadar web a Dispositivos Moviles-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ASTUDILLO'S GROUP @yield('title')</title>

    <!-- Styles -->
<!-- 	<link rel="stylesheet" href="{{asset('css/menu.css')}}"> -->
	<link rel="stylesheet" href="{{asset('css/fonts.css')}}">

   <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> 
   <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
      @livewireStyles 

   <!-- 	<script src="{{asset('js/menu.js')}}"></script>  -->

<!-- 
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>	 -->						
		

<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
 </head>
 
 
<body>

<div>
	<header class="header"> 
		<video  id="video" autoplay loop muted >
			<source src="{{ Storage::url("Header.mp4")}}" type="video/mp4">
		</video>
	</header> 
</div>

<div class="menu-alt"> 
<nav class="navbar navbar-expand-lg navbar-light ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 

<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

    <li class="nav-item {{ request()->routeIs('welcome') ? 'd-lg-none' : ''}}">
      <a class="navbar-brand" href="{{ route('welcome') }}">  
        <img src="{{asset('images/icons/home.png')}}" width="50" alt="Inicio" title="Inicio">
      </a>
    </li>

	<li class="nav-item {{ request()->routeIs('nosotros') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('nosotros') }}">Nosotros 
        	<span class="sr-only">(current)</span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('cursos') ? 'active' : ''}}" >
            <a class="nav-link text-success display-6" href="{{ route('cursos.index') }}"><span class="icon-rocket"></span>Cursos</a>
    </li> 
    <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            IDEAS
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           <li role="presentation" class="dropdown-header">Título de sección</li>
           <a class="dropdown-item" href="#">Action</a><br>
           <a class="dropdown-item" href="#">Another action</a><br>
           <a class="dropdown-item" href="#">Something else here</a>
        </ul>
    </li>
    <li class="nav-item">
		<a class="nav-link" href="{{ route('aulas')}}"><span class="icon-earth">AulaVirtual</a>
	</li>
	<li class="nav-item">
		<a class="nav-link disabled" href="" title="un souvenir para tí">Tienda</a>				
	</li>
	<li class="nav-item">
		<a class="nav-link disabled" href=""><span class="icon-mail">Contactos</a>
	</li>

 </ul>
    <form class="form-inline my-2 my-lg-0" style="display: none;">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="auth" style="display: flex;"> 
	@if (Auth::user())
	<a href="{{ url('/logout') }}"  class="user-auth" data-toggle="dropdown" role="button" aria-expanded="false"> 
	</a>				
	<ul class="navbar-nav mr-auto mt-2 mt-lg-0">   
    	<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        	<?php echo  (strtoupper (Auth::user()->username) )?>
        </a>
        <a href="{{ route('Admin') }}" class="">
            	
           	<img src="{{ asset('images/icons/ajustes.png') }}" width="30" height="35" >
            	@if ((Auth::user()->privileges) === 1)
            	  Usuario Administrar
            	@endif
		</a>
        
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           <li role="presentation" class="dropdown-header text-danger">

           		<a href="{{ route('logout') }}" class="text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Salir">Cerrar Seccion
				   	</a>
					<form id="logout-form" action="{{ route('logout') }} " method="POST">
						{{ csrf_field() }}  
					</form> 
	        </li>
	    </ul>
	</li>
	</ul>
			@else 
				<a href="{{ route('login') }}" class="user_auth"><img src="{{asset('images/icons/acceso.png')}}" width="30" height="35">
					Acceder
				</a>			   		    	
			@endif
			</div>


</nav>
</div>
	<!-- &nbsp;&nbsp;&nbsp;&nbsp; -->

<!-- <div class="auth"> 
@if (Auth::user())
    <a href="{{ url('/logout') }}"  class="user-auth" data-toggle="dropdown" role="button" aria-expanded="false"> 
		<?php echo  (strtoupper (Auth::user()->username) )?>
	</a>				
	@if ((Auth::user()->privileges) === 1)
		<a href="{{ route('Admin') }}" class="">
			<img src="{{ asset('images/icons/ajustes.png') }}" width="30" height="35" >  Usuario Administrar
		</a>			    
	@endif
	<ul class="dropdown-menu" role="menu">dejo abierto 'ul' 				
	<li> 
	  	<a href="{{ route('logout') }}" class="salir" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Salir">Cerrar Seccion
	   	</a>
		<form id="logout-form" action="{{ route('logout') }} " method="POST">{{ csrf_field() }}  
		</form> 
	</li>
@else 
	<a href="{{ route('login') }}" class="user_auth"><img src="{{asset('images/icons/acceso.png')}}">
		Acceder
	</a>			   		    	
@endif
</div> -->


<!-- <div class="input-group  {{ !(request()->routeIs('cursos') )? 'd-lg-none' : ''}}">
 	<div class="form-outline">
 		<form class="">
	    <input type="search" id="form1" class="form-control" placeholder="Search" />	    
	 </div>
	  <button type="button" class="btn btn-primary" style="font-size: 0.8rem;">  
	  	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
		<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
		</svg>
	</button>
  </form>  
</div> -->







<div  class="container-2">					
	<div  class="container-left" >
		 @yield('content')
		@livewireScripts		      
	</div>
	<div class="container-right" > 
		<div align="center">
			<a href="{{ route('aulas')}}"> 
				<img src="{{ asset('images/aula-virtual.png')}}" class="img-left" title="entrar al Aula Virtual">
			</a> 
		    <br><br>
			<a href="">  
			<img src="{{ asset('images/Asociados.png')}}" class="img-left" title="Asociados">
			</a>	
		</div>    	
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
			

<!-- 
    <script src="{{ asset('js/app.js') }}"></script>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 <!--    <script src="http://code.jquery.com/jquery-latest.js"></script> -->
	



</body>
</html>


    @yield('script')
