<div  style="margin:2%; " class="text-center">
    <span class=" text-success display-5">
    	{{$part->name}}&nbsp;{{$part->last_name}}
    </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;              
	<img src="{{asset('images/icons/checked.jpg')}}" width="50" height="30" />   

	@if($UserAula)
				<br><label class="display-6">Ya ha creado el Aula Virtual para este curso </label><br>
 				<a href="" class="nav-link">
 					
 					Olvido sus datos de acceso?
 				</a>
 			</label>
	@endif
    
</div>