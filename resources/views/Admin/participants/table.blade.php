<div>

    @if (session('mensaje'))
		<div class="alert alert-success">             
			{{ session('mensaje') }}
		</div>
	@endif
@if($parts->count())
	<br>
	<input type="text" class="search-input"  wire:model="searchPart"  placeholder="Buscar" >    
	<table class="table">   		
		<thead class="thead-dark"> 			
		<tr align="center">        			
			<th>Nombre y Apellido(s)</th>
			<th>Accion</th>
		</tr>
		</thead>
		<tbody> 
	   <?php $cont = 1; ?>	
		@foreach($parts as $part)    		
		<tr @if($cont % 2 == 0) style="background: #ADD8E6" @endif >
			<td>{{ ucfirst(trans($part->name)) }} {{ ucfirst(trans($part->last_name)) }}</td>
			<td align="center">
<!-- 	<img src="{{asset ('images/icons/editar.png')}}" wire:click="edit({{ $part->id }})" class="img-act"> -->
				<button wire:click="edit({{ $part->id }})" class="btn btn-info">editar | ver</button>
                 
<!--
				&npsn; <button wire:click="destroy({{ $part->id }})" class="btn btn-danger">Eliminar</button>
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
			{{ $parts->links() }}
     </div> 

  
 </div>
    
  
