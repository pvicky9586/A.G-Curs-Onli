@extends('layouts.appAdmin')
@section('title','- Section Admin')
@section('content')

<div align="center">
	<small class="title">Welcome Section Admin</small>
	<p >Courses | Participants | Responsible | Inscription | Virtual Class | User | Reports</p>
</div>
	
	
           
<div class="input-group marg-tool">	

<!-- RESPONSABLS -->
	 <div class="tool-enl" align="center">
	    <a href="{{ route('resp-livew')}}" title="Responsabls">
			<img src="{{asset('images/resp.png')}}"class="img-tool-admin" ><br>
			Responsibles
		</a>	
	 </div>
	  
<!-- PARTICIPANTS -->	
   <div class="tool-enl">
		<a href="{{ route('part-livew') }}" title="Participants">
			<img src="{{asset('images/participants.jpg')}}" class="img-tool-admin" style="opacity: 0.3"><br>
			Participants
		</a>
	</div>	

<!-- USERS -->
	<div class="tool-enl"> 
			<a href="{{ route('AdmUser') }}" title="Usuarios">
			<img src="{{asset('images/loguear.png')}}" class="img-tool-admin"  style="opacity: 0.3"><br>
			Users
		</a>                           	  
	</div>

</div>


<div class="input-group marg-tool">
<!-- CURSOS -->
	<div  class="tool-enl" title="Cursos" >
		<a href="{{ route('cursos') }}"> 
		<img src="{{ asset('images/cursos-online.jpeg') }}"  class="img-tool-admin"> <br>
		 <span class="display-4">Courses</span>
		</a>
	</div>

<!-- INSCRIPTION-->	
   <div class="tool-enl" title="valid Inscription">
		<a href="{{ route('insc-auth') }}" title="ver/validar inscripcion">
			<img src="{{ asset('images/list-inscrip.png')}}" class="img-tool-admin"><br>
			<span>Inscription<br>Valid/imprimir</span>
		</a>
	</div>

<!-- Virtual Class  -->
	<div class="tool-enl" title="entrar al Aula Virtual">
		<a href="{{ route('class')}}"> 
			<img src="{{ asset('images/class-virtual.png')}}" class="img-tool-admin"  ><br>
			<span class="">class Virtuals</span>
		</a> 
	
	</div> 

</div>


		


	   	
	
	
	
	
@endsection
