<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ASTUDILLO'S GROUP @yield('title')</title>

    	<link rel="stylesheet" href="{{asset('css/menu.css')}}">
	<link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    <!-- Styles -->
   <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> 
   <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
   @livewireStyles 
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
        <a class="nav-link" href="{{ route('nosotros') }}">Nosotros <span class="sr-only">(current)</span></a>
      </li>
         <li class="nav-item {{ request()->routeIs('cursos') ? 'active' : ''}}" >
            <a class="nav-link" href="{{ route('cursos.index') }}"><span class="icon-rocket"></span>Cursos</a>
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
  <!--   <form class="form-inline my-2 my-lg-0"> 
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
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
             @if ((Auth::user()->privileges) === 1) 
                <img src="{{ asset('images/icons/ajustes.png') }}" width="30" height="35" >
                <small>Usuario Administrar</small>
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

			
	

	<div  class="contontainer-2">					
		
			@yield('content')
			@livewireScripts  		      

		    
	</div>
		
  


	
	
			<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    

    <script src="{{asset('js/menu.js')}}"></script>

    @yield('script')
</body>
</html>


   
