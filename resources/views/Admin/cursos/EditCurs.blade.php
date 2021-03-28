@extends('layouts.appAdmin')
@section('title','- Cursos')
@section('content')
	
	 <div class="title text-center">
	 	Actualizar Curso
	 </div>
		@if ($errors->has('login'))
			<span class="help-block">
				<strong>{{ $errors->first('login') }}</strong>
			</span>
		@endif  
  
<div class="container">	              
	<form class="form-horizontal" method="POST" action="{{ route('UpCurso', $edit->id) }}" 
		name="formulario" enctype="multipart/form-data" onsubmit="return confirm('¿Wish Update?');" id="formulario">
		@method('PUT')
	    @csrf
		@error('title')
			<span class="alert alert-danger">indicate a course title</span>
		@enderror  
		<div  class="form-group">			
			<label class="display-5 text-primary">Title a course:</label>
			<input type="text" name="title" value="{{ $edit->title }}" class="text-success form-control bold form-control " autofocus >		
		</div>
				
		<div class="form-group">
			<label class="">Description:</labe>
			<textarea name="description"  class="form-control"  value="{{ old('description') }}" cols="150" rows="5">{{$edit->description}}
			</textarea>
		</div>
			
		<div class="form-group">				 
			@if($edit->img == '')
				Image
				<input type="file" name="img" value="" id="miArchivo" accept="image/png, .jpeg, .jpg, image/gif"> 
			@else
				<div style="display:flex;">	
					<span class="display-5" style="width: 100%;">¿Cambiar imagen? </span>
						<input type="file" name="img" value="" id="miArchivo" style="color: transparent;" accept="image/png, .jpeg, .jpg, image/gif">   
						<img src=" {{ Storage::url("$edit->img")}}" alt="Imagen no encontada" class="img-curs"/>	
				</div>
			@endif
		 </div>
	
		
		<br>
		<div class="form-group">
		    <div style="font-size:1.2rem; color: #F1671D;"> 
		    	<small>Volver a configurar el/los Resposable(s) del curso<span> de lo contrario no habra registro</span>:</small> 
			</div>
			@error('resp')
				<small style="margin-top:3%; color: #F1671D;">Debe volver a configurar el/los Resposable(s) del curso<span>de lo conrio no habra registro</span>:</small> 
			@enderror
		</div>
		<div style="display: flex;">	
		<div class="form-group">  				
				<div class="form-group"  id="Resp">  				
					<input type="radio" id="Resp" name="cant_resps" value="1" onclick="SelecDinam()">uno &nbsp;&nbsp;&nbsp;
					<input type="radio" id="Resp" name="cant_resps"  value="2" onclick="SelecDinam()">mas...				
				</div>	
				<div  align="right" class="display-5" >
						<label> Si responsable No esta en la lista de <a href="{{ route('resp-livew')}}" title="Responsabls">click aqui</a></label>
				</div>
		</div>	
		</div>


			<div id="uno" style="display:none; padding:10;"> 		
				<select name="resp">
					<option value="">Seleccione</option>
						@foreach($resp as $item)
							&nbsp;&nbsp;<option value="{{$item->id}}">{{ $item->name }} {{ $item->last_name }}</option>
						@endforeach
					</select>
			</div>		
		 	<div id="mas" style="display:none;">
				@foreach($resp as $item)
						<input type="checkbox" name="resp[]" value="{{$item->id}}">{{ $item->name }} {{ $item->last_name }}
				@endforeach
	        </div>
              
			<div style="margin-left:5%; margin-top:5%;">
				<h1> Duraccion
				<input type="text" name="duracion" size="10" value="{{ $edit->duracion }}"  placeholder="Ejem: 5 hras">  </h1> 
	       </div> 
	   </div>
       <br>
	       <div style="">
		       @if($edit->statud== 1)			
					<label id="msj"  class="display-4 text-primary">Published</label><br>
					Dejar de Publicar  &nbsp;&nbsp;&nbsp;<input type="radio" id="public" name="statud" value="0"  onclick="Public()"><!-- &nbsp;&nbsp; -->
					<!-- <input type="radio" id="public" name="statud"  value="1" onclick="Public()">No	 -->		
			   @else
		    	    <label id="msj"  class="display-4 text-danger" >¡No Published!</label><br>
		    	    Published  &nbsp;&nbsp;&nbsp;<input type="radio" id="public" name="statud" value="1"  onclick="Public()" > <!-- &nbsp;&nbsp;&nbsp;
					<input type="radio" id="public" name="statud"  value="0" onclick="Public()">No  -->
			   @endif
			</div>
	           <div align="center">	
				  <input type="submit" name="btnsave" class="tex-bt btn btn-success" value="Actualizar"/>	
				 <a href="{{ route('cursos') }}"> <input type="button" value="Cancelar" class="btn btn-danger" ></a>
	          </div>

	</form>
	</div>
<!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
    <label class="btn btn-info">
        <input type="radio" name="gender" value="hombre" autocomplete="off"> Hombre
    </label>
    <label class="btn btn-info active">
        <input type="radio" name="gender" value="mujer" autocomplete="off"> Mujer
    </label>
</div>	 -->

</div>	        

@endsection

<script src="{{ asset('js/SelcDinam.js') }}"></script>  
<!-- <script src="{{ asset('js/public.js') }}"></script>  -->
<script src="{{ asset('js/forms.js') }}"></script> 
