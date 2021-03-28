<div  class=" form-gruop display-6" style="width: 80%; margin-top: 2%;">		
			<div style="display: flex;">
				<div style="margin-top: 10%;">
					<select wire:model="curso_id" class="text-primary-2 form-control" wire:change="change_curso">
				 		<option value="">Seleccione el curso</option>
				 		@foreach($cursos as $curso)
				 			@if($curso->statud == 1)
				 				<option value="{{$curso->id}}">{{$curso->title}}</option>
				 			@endif
				 		@endforeach
				 	</select>
				 	<!-- @error('curso_id')
						<label class="alert alert-danger">Seleccione el curso</label>
					@enderror -->
				</div>
				<div>
				@if($curs)
					<div align="center" class="flex">
				   		<img src="{{ Storage::url("$curs->img") }}" alt="imagen no disponible" class="img-curs-2"/>  	<label class="display-6 text-primary">Leccion
					<!-- 	<select wire:model="seccion" class="form-control-lg" wire:change="verif">
							<option value="">Nª</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							</select> -->
								<input type="text" wire:model="seccion" size="5" placeholder="indicar"  wire:change="verif">

						</label>
						 @error('seccion')
					   	<small class="alert alert-danger">indique la seccione</small> 
					  @enderror
					</div>
					@else
						<img src="{{asset('images/cursos-online.jpeg')}}" class="img-curs-2">
					@endif
			

				</div>

		
			</div>
	
</div>