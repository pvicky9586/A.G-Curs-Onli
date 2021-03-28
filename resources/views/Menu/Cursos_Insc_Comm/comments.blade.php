<div>
	 <div >
        <br><br>
           	<div align="center" class="text-primary"><b>New Comments</b></div>
     
<!--     <form class="" wire:submit.prevent=""></form> -->
  <form wire:submit.prevent="savecomment">
        <div class="form-group">
           <input type="text" wire:model="nameCom" placeholder="name" class="form-control" autofocus>
              @error('nameCom') <span class="text-danger error">enter name</span>@enderror
           <input type="text" wire:model="emailCom" class="form-control" placeholder="email@example.com">
              @error('emailCom') <span class="text-danger error">enter a valid email</span>@enderror
        </div>
        <div class="form-group"><!-- class="ckeditor" -->  
            <small><i><b>Comentar</b></i></small>
            <textarea  wire:model="comment" id="comment" align="center" class="form-control"  placeholder="enter commentt" autocomplete="off"> 
            </textarea>        
               @error('comment') <span class="text-danger error">enter comment</span>@enderror                   
        </div>            
        <input type="text" wire:model="curso_id" value="{{$curso->id}}" class="toast hide" >
       

        <div align="right"> 
          <button type="submit" class="btn btn-primary" >Enviar</button>

<!--             <button wire:click="savecomment" class="btn btn-primary" >Enviar</button> -->
            <button wire:click="default" class="btn btn-warning">Clear</button>
         </div>         
      </div>
    </form>
</div>








<!--FORM COMMENT-->
<!--     <div class="">
          <form>
              @csrf
         
    			<label class="text-muted">Comentar</label> 
    		    <div class="form-group" >

                       <input type="text" wire:model="name" name="name" class="form-control" class="form-control" placeholder="Name">
                          @error('name') <span class="text-danger error">indique su nombre</span> @enderror
                       <input type="text" wire:model="email" name="email" class="form-control" placeholder="email">
                          @error('email') <span class="text-danger error col-8">ingrese un email valido</span>@enderror
                </div>
    			<div class="form-group">
    			 	   class="ckeditor"
    			       <textarea wire:model="comment" name="comment" id="comment"  align="center" class="form-control" placeholder="">añadir Commentario
    			       	</textarea>    
    			        @error('comment') <span class="text-danger error">añada un comentario</span>@enderror    
    			 </div>
    		                        
    	       <div align="left">
        	       	<input type="text" wire:model="curso_id" name="curso_id" value="{{$curso->id}}" class="toast hide" >
    	        	     <button type="submit" class="btn btn-primary  btn-lg" wire:click="comment()" name="btnsave">Añadir</button>
    		             <button type="reset" class="btn btn-warning">Borrar</button>
    	       </div>
         </form>
    </div>			       -->