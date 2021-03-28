 <div class="form-group" align="center">

 		<input type="text" wire:model="curso_id" value="{{$curso_id}}" class="d-lg-none">
 		<input type="text" wire:model="cedula"  class="display-5" placeholder="Ingrese cedula de Identidad" autofocus required  onkeyUp="return ValNumero(this);" wire:change="verif({{ $curso_id }})" autofocus />
		@error('cedula')
			<label class="alert-danger">Cedula Obligatoria</label>
		@enderror

</div>

