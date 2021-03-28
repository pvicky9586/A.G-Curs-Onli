@extends('layouts.appAdmin')
@section('title','- Cursos')
@section('content')

<div class="title"><b>Cursos</b></div>


				  @if (session('mensaje'))
					<div class="alert alert-success">             
						{{ session('mensaje') }}
					</div>
				  @endif
				  	
			      <div>
					  <a href="{{ route('Newcurso') }}"  title="Nuevo Curso"><img src="{{asset('images/icons/bt-new.jpg')}}" width="80">Nuevo Curso</a>
			      </div >
			    
			 	    
	<div  class="container">
		@if(empty($cursos))	
			<h1>No hay Cursos Registrados</h1>
		@else 
		@foreach($cursos as $item)	
	        <div class="listCurs">  							
				<div class="form-group" align="center" style="width: 100%;">
					<label class="display-4">
						<a href="{{ route('detaill', $item) }}" title="Ver detalles" >
							<?php echo (strtoupper($item->title)) ?>
						</a> 
					</label>
					<img src=" {{ Storage::url("$item->img")}}" alt="Imagen No disponible" align="right" title="imagen del curso" class="img-curs">
					
			
				@if (!empty($item->description))
					 <?php $tam = strlen($item->description); ?>
					@if ($tam <= 200)                
					<small class="text-muted display-6">{{$item->description}}</small>
               		@elseif ($tam > 200)
					<small class="text-muted display-6"> <?php echo substr($item->description, 0, 200); ?>... </small>
					@endif
				@else
				    <p>Descripcion No disponible</p>
				@endif
			</div>
		        @if($item->duracion)
                        <small class=" display-6 text-uppercase"><b>Duration {{$item->duracion}}</b></small>
                @endif
                <br><br>
				<div  align="center">
					<a href="{{ route('EditCurs', $item) }}" title="editar"> 
					<img src="{{ asset('images/icons/editar.png') }}" class="edit" align="center">Editar</a>
				</div>  
				@if($item->statud ==1)
					<label class="text-success display-6">Published</label>
				@else
					<label class="text-danger display-6">Sin publicard</label>
				@endif
				</div>

				
			</div>
			 <br><br> 
			@endforeach
			    <label>{{ $cursos->links()}}</label> 	
						
			@endif		
	      </div>	
	
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			    
			    
			    
			    
		

@endsection
