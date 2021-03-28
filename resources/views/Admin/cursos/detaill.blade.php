@extends('layouts.appAdmin')
@section('title','- Detalles')
@section('content')

<div class="listCurs">     
	<div class="display-4 text-primary text-center img-curs-detaill" style="width: 80%;">
		<small><b>{{$ver->title}}</b></small><br>	
		<img src=" {{ Storage::url("$ver->img")}}" alt="Imagen no encontada" />
	</div>
	<div class="display-6">
		<b>Descripcion: </b>
  		<label class="text-center" style="margin-left: 10%; margin-right: 15%; margin-top: 0;">{{$ver->description}}</label>
  	</div>
 	<div align="center">
	    @if($ver->duracion)
	        <small class="text-primary display-5 text-center">{{$ver->duracion}} de duration</small>
	    @endif
	    <br><br>
	    @if($ver->statud ==1)
			<label class="display-5 text-success">Published</label>
		@else
			<label class="display-5 text-danger">Sin publicard</label>
		@endif
  	</div>
</div>
  <div align="left" style="margin-left:60%;">
	<a href="{{ route('cursos') }}" title="ir atras">
	   <img src="{{ asset('images/icons/back.png') }}"  class="irAtras"></a> 
	</div>
</div>
@endsection