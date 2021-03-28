 <div align="left" style="margin-left:50%;">
	<a wire:click="back" title="ir atras">
   <img src="{{ asset('images/icons/back.png') }}"  class="irAtras"></a> 
</div>

	<br>
	<table class="table">   		
		<thead class="thead-dark"> 			
		<tr align="center">        			
			<th>Courses</th>
			<th>lections</th>
			<th>Accion</th>
		</tr>
		</thead>
		<tbody> 
			<?php $i=0; ?>
		@foreach($clases as $class)    		
		<tr>
			@foreach($cursos as $curso)
				@if($curso->id == $class->curso_id)
					<td>{{ $curso->title }}</td>
				@endif
			@endforeach
			
			<td align="center"> 
			@foreach($lecs as $cs) 				
				@if($cs->clase_id == $class->id)
					<?php $i=$i+1; ?>
				@endif					
			@endforeach
			<?php echo $i; ?>
			</td>
			<td align="center">
				<button wire:click="" class="btn btn-info">editar | ver</button>
			</td>
		</tr>

		@endforeach
      </tbody>
      </table>

{{$fil}}


