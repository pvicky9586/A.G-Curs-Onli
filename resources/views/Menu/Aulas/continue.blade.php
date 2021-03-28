<div  class=" form-gruop display-6" align="center" style="margin-top: 2%;">
		@if (session('mensaje'))
			<div class="alert alert-success">             
				{{ session('mensaje') }}
			</div>
		@endif
		<select wire:model="curso_id" class="text-success">
		 	<option value="">Seleccione el curso</option>
		 		@foreach($cursos as $curso)
		 			@if($curso->statud == 1)
		 				<option value="{{$curso->id}}">{{$curso->title}}</option>
		 			@endif
		 		@endforeach
		 </select>
		@error('curso_id')
			<label class="alert alert-danger">Seleccione el curso</label>
		@enderror

	@if($curso_id)
		<label class="form-gruop text-center display-5" style="display: block; margin-top: 2%;">
			<i>Esta registrado en el <b>aula virtual </b> del curso seleccionado?</i><br>
			<button wire:click="logeat({{ $curso_id }})" class="btn btn-primary">Si</button>
			<button wire:click="regist({{ $curso_id }})" class="btn btn-success">No</button>
		</label>
	@endif
</div>