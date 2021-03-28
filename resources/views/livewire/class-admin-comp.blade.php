<div class="container">
		<div>
			<label class="display-4 text-primary-2 text-center">Administrar Class Virtuals</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label align="right" style="cursor: move;" wire:click="list" >
				<div align="center">
					<img src="{{asset('images/reg.jpg')}}" width="100" height="150" title="Lista Class" ><br><a href="">Lista de clases</a>
				</div>
			</label>
		</div>
		 	@if (session('mensaje'))
				<div class="alert alert-success">             
					{{ session('mensaje') }}
				</div>
			@endif

	@if($class_select)
		@include('Admin.Class.class_select')
	@endif

	@if($list)
		@include('Admin.Class.list')
	@endif

	@if($mensaj)		
		<div>
			<small class="text-danger display-5">Esta seccion ya ha sido creada,</small>
			<span class="text-success display-6"> desea actualizarla?</span>
		</div>
		<div align="center">
			<button class="btn btn-primary bt-lg" wire:click="edit">SI</button>
			<input type="button" class="btn btn-warning" value="Dejar como esta" wire:click="dejar">
		</div><br><br><br>
	@endif
	@if($create)
		@include('Admin.Class.create')
	@endif

	@if($edit)
		@include('Admin.Class.edit')
	@endif




</div>
</div>