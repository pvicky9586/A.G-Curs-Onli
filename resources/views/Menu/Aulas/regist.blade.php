<div  style="margin-left: 10%; margin-right: 10%; padding: 3%; background: #fff;border: 0.5px solid; border-color: #c1c0c0" class="">
	<label class="display-5 text-success">{{$part->name}} {{$part->last_name}}</label>
	<div class="d-lg-none">
		<input  type="text" wire:model="part_id">
		<input  type="text" wire:model="curso_id">
 	</div>
 	 <div class="form-group">
 		<label  class="display-6">User:</label> &nbsp;&nbsp;&nbsp;
 		<span class="display-8"><i>debe contener: entre 5-10 caractes Alfa-numericos</i></span>	
	    <input type="text" wire:model="usuario" class="form-control" autofocus><br>	   
	    @error('usuario')
			<label class="alert-danger">Usuario Obligatorio</label>
		@enderror
	</div>
	<div class="form-group">
	    <label  class="display-6">Email:</label>
		<input type="text" wire:model="email" class="form-control" ><br>
		@error('email')
			<label class="alert-danger">Email Obligatorio</label>
		@enderror
	</div>
	<div class="form-group">
		<div>
			<label class="display-6">Password</label>&nbsp;&nbsp;&nbsp; 
			<span class="display-8"><i>debe contener: entre 5-10 caractes Alfa-numericos</i></span>	
		</div>
		<div  style="display: inline-flex; width: 100%;">
			<input id="password" type="password" name="password" wire:model="password" placeholder="Insert Password"  class="form-control" required>&nbsp;&nbsp;
			<input id="password-confirm" type="password" name="password_confirmation" wire:model="password_confirmation" placeholder="Confirmatión" class="form-control"  >
		</div>
		     @if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
			@endif
	</div>
	<div class="form-check">
    	<input type="checkbox" class="form-check-input" id="exampleCheck1">
    	<label class="form-check-label" for="exampleCheck1">Recordame</label>
  	</div><br>
    <div align="center">
        <input wire:click="clear"   class="btn btn-danger" value="Limpiar" />
        <input wire:click="saveregistro"  class="btn btn-warning" value="REGISTRARSE" />
    </div>

</div>












