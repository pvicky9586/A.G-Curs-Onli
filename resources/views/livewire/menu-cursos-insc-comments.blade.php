<div class="container">
   
    	@if ($view == 0)    		
			@include("Menu.Cursos_Insc_Comm.cursos")
			
		@elseif($view == 1)
			@include("Menu.Cursos_Insc_Comm.inscribirse")			
		@endif
			
</div>
