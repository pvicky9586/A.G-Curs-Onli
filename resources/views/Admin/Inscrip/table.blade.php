<div style="margin-top: 10%;">

				 @if (session('mensaje'))
					<div class="alert alert-success">             
						{{ session('mensaje') }}
					</div>
				 @endif
	@if(asset($cursos))
	<table class="table">   		
		<thead class="thead-dark"> 			
		<tr align="center">   
				<th>Course</th>
				<th>Valid/Exp</th>
				<th><img src="{{asset ('images/icons/show.png')}}" width="50"></th>
			</tr>
		</thead>
		<tbody>	
		@foreach($cursos as $curso) 		
			<tr>
				<td class="text-primary text-center text-uppercase display-5" style="height: auto;">
					{{$curso->title}}
				</td>

				<td class="display-5 alert-danger" style="display: flex;">
					<div>{{$curso->inscs_count}}
					<img src="{{asset ('images/icons/nosotros-cont.png')}}" wire:click="ConfIns({{ $curso->id }})" class="all-scroll" width="80" height="50" title="confirmar inscripción">
					</div>
				</td>					
	
				<td align="center" class="ver-insc">
					<img src="{{asset ('images/icons/ver.png')}}" wire:click="ver({{ $curso->id }})" class="all-scroll" width="30" title="ver">		
				</td>
			</tr>	
		@endforeach		
		</tbody>
		
	</table>

	 <div style="color:blue;">
			{{ $cursos->links() }}
     </div>
  @else
  	<label>No hay inscritos</label>   
  @endif
 </div>