<div>

      @if (session('mensaje'))
		<div class="alert alert-success">             
			{{ session('mensaje') }}
		</div>
	 @endif
@if($resps->count())
	<br>
	<input type="text" class="search-input" wire:model="searchResp" placeholder="Buscar" >
	<table class="table">
		<thead class="thead-dark">
		<tr align="center">
			<th>Nombres(s) Apellido(s)</th>
			<th>Accion</th>
		</tr>
	</thead>
	<tbody>
		<?php $cont = 1; ?>	
		@foreach($resps as $resp)
		<tr @if($cont % 2 == 0) style="background: #ADD8E6" @endif>
			<td>{{ $resp->name }} {{ $resp->last_name }}</td>
			<td align="center">
				<button wire:click="edit({{ $resp->id }})" class="btn btn-info">editar | ver</button>
<!--
				&npsn; <button wire:click="destroy({{ $resp->id }})" class="btn btn-danger">Eliminar</button>
-->
			</td>
		</tr>
		 <?php $cont= $cont + 1; ?>
		@endforeach

	</tbody>
	</table>
	@else
<br><br>
	<label>No hay registros</label>
@endif	
     <div style="color:blue;">
			{{ $resps->links() }}
     </div>
     
     
 </div>
