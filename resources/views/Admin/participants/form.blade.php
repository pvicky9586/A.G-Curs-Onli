<div>
	 
	<small class="title-op">Información personal</small>
	<div class="form-gruop">
		<input type="text" wire:model="cedula"  class="form-control text-bold"  autofocus required placeholder="Cedula" onkeyUp="return ValNumero(this);" wire:change="verif"> 
		@error('cedula')
			<label class="alert-danger">Cedula Obligarotia</label>
		@enderror
	</div>
 <!--   @if (session('mensaje'))
			<div class="alert alert-success">             
				<small>{{ session('mensaje') }}  </small>
			</div>
		@endif
 -->
    <div class="form-group" >
		<input type="text"   wire:model.lazy="name" class="form-control"  autocomplete="on" placeholder="Nombre(s)"  > 
		<input type="text" wire:model.lazy="last_name"  class="form-control" autocomplete="on"  placeholder="Apellidos(s)">
	</div>
	
	<br>

    <small class="title-op">Información de contacto</small>
    <div class="info form-group">   		 			
		<DIV>E-mail
			<input type="email" class="form-control" wire:model="email"  autocomplete="on"> 
			@error('email')
				<label class="alert-danger"> E-mail no valido</label>
			@enderror
		</DIV>
		<div>Telefono
			<input type="text" class="form-control"  wire:model="telef"  autocomplete="on"  onkeyUp="return ValNumero(this);" >  
	    </div>
        <div>
			<label>WhatsApp</label> 
			<input  type="text" wire:model="NroWp" class="form-control" />
	    </div>
	            
	           
	 </div>

 </div>



<script src="{{ asset('js/validar.js') }}"></script>

