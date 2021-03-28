<!-- VIEW CURSOS & COMMENT-->

<div>
       
  <div style="display: flex;" align="center" >
    <div class="title" style=" padding-left: 10%;" >
      <b>Cursos </b>
    </div>
    <div align="center" class="none" style="margin-left: 10%;">
      <label class="display-6"><i>Esta hoja que se abre lleva impresa tu nombre y el mío, con la
      intención podamos surcar sin líneas no delineadas pero si contenidas.
      Más que un material para ser visualizado y revisado, nos motiva la
      circunstancia de la utilidad que puedas obtener del mismo. Hazlo tuyo,
      y siéntelo con la fuerza que brinda el camino para que le transites sin
      temor alguno.</i></label>
    </div>
  </div> 
  @if (session('mensaje'))
    <div class="alert alert-success">             
        <label>{{ session('mensaje') }}  </label>
    </div>
  @endif 
  @foreach( $cursos as $curso)
  <div class="listCurs" > 
  		<p class="display-5 text-primary text-center text-uppercase" >{{ $curso->title}}</p>				   
	    <div align="center">
         <div>
          <img src="{{ Storage::url("$curso->img") }}" alt="imagen no disponible" class="img-curs"/>  
       </div>

			<div  style="padding:0; width: 80%;">	
        @if($curso->description)
          <small class="text-muted">{{$curso->description}}</small>
		    <!-- <?php $tam = strlen($curso->description); ?>
				@if ($tam <= 200)                
					<small class="text-muted">{{$curso->description}}</small><br> 
        
        @elseif ($tam > 200)
					<small class="text-muted"> <?php echo substr($curso->description, 0, 200); ?> </small>
        	<details>
					   <summary style="font-size: 1rem;"><i>leer mas...</i></summary>
					   <span class="text-muted"><?php echo substr($curso->description, 200);?></span>
             @if($curso->duracion)
				  	   <small class="text-primary" > - duration: {{$curso->duracion}}   </small>
             @endif
				  </details>
            @else
          <p>Descripcion No disponible</p>
        @endif -->

				@else
				  <p>Descripcion No disponible</p>
				@endif

        <br>
        @if($curso->duracion)
          <small class="text-primary display-5">duration: {{$curso->duracion}}</small>
        @endif
			</div>


       
    	</div>
    
    <div align="center">
      <button wire:click="insc({{ $curso->id }})" class="btn btn-success">Participar | inscribirse</button>
    </div>


			  
  @if (session('comment'))
    <div class="alert alert-success">             
        <label>{{ session('comment') }}  </label>
    </div>
  @endif
    <!--VER COMMENTS-->
    <details>
			<summary style=""><i class="fa fa-share"></i> See all Comments</summary>						
				<?php $Nro = Count($curso->comments); ?>
   			@if ($Nro>0)
        			<!-- 	<label> <i><b>{{$Nro}} comentarios</b></i></label><br> -->
					@foreach($comments as $comm)
						@if($curso->id == $comm->curso_id)	           					                  
						 	<div class="media-body">
                <h4 class="media-heading">
                  <img src="{{asset('images/icons/comment.png')}}" width="80">
                  <a href="#fakelink">{{$comm->name}}</a> 
                  <small>
                    @if($comm->created_at)
                      {{ date_format($comm->created_at, 'j M Y') }}
                    @endif
                  </small>
                </h4>
                 <p>{{$comm->comment}}</p>
              </div>
						@endif                  
					@endforeach	            
					<?php echo $comment=''; ?> 
				@else
				 <small class="">sin comentarios...</small>
			  @endif  			
  
      </details>
      <br>
      <button wire:click="comment({{ $curso->id }})" class="btn btn-primary">Añadir Comentario</button>         
        @if ($viewcomment == 3)
          @include('Menu.Cursos_Insc_Comm.comments')
        @endif

</div>
   @endforeach

     <label>{{ $cursos->links()}}</label> 	
</div>
                         











