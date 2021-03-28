<div class="form-group">
	<h2 class="text-warning">Actualizar</h2>
	<div class="form-group form-2">
		<label class="text-center display-6 text-primary">{{$title}}</label><br>
		<label class="text-right display-5 text-success"><b>Seccion: <b>{{$seccion}}</label>
		
	<div style="display: flex;">
		@if($curso->img)
	   		<img src="{{ Storage::url("$curso->img") }}" alt="imagen no disponible" class="img-curs-2"/> 
		@endif
		<div class="text-center display-5" style="margin-left: 5%; margin-right: 5%; margin-top: 12%;">Actualizar recursos subidos
			<p class="display-7 text-danger">formatos permitidos '.png, .jpg, .jpej, .mp3, .doc, .docx, .xml, .pdf, .mp4, .MPEG-4, .zip, .rar
			</p>
		</div>

	</div>
	
	<label class="text-center text-success display-6">Imagesnes/videos/documentos/zip...</label><br>
	<div class="">
	<div  style="display: flex;">
	@foreach($secc as $sec)
		<?php if(Str::endsWith($sec->file,['.png','.jpg','.jpeg'])){	?>
			<div align="center">
				<img src="{{ Storage::url("$sec->file") }}" alt="imagen no disponible" class="img-file" 
				style="cursor: pointer"title="{{$sec->name_file}}" />
				<img src="{{asset('images/icons/trash.svg')}}" wire:click="delet({{$sec->id}})" title="Eliminar" style="cursor: move; ">		
			</div>			
		<?php }?>				
	@endforeach
	</div>
<br>

@foreach($secc as $sec)
	<?php if(Str::endsWith($sec->file,['.mp4','.MPEG-4'])){	?>
			<div align="center">
				<video  id="video-curs-2" autoplay loop muted >
					<source src="{{ Storage::url($sec->file)}}" type="video/mp4" style="cursor: move;  width: 5%;">
				</video>
				<img src="{{asset('images/icons/trash.svg')}}" wire:click="delet({{$sec->id}})" title="Eliminar" style="cursor: move; width: 3%;">	
			</div>	
	<?php }?>
@endforeach
<br>


<div style="display: flex;">
@foreach($secc as $sec)
	<?php if(Str::endsWith($sec->file,'.pdf')){	?>
		<div style="display: block;" align="center">
			<img src="{{ asset('images/icons/PDF.png') }}" title="{{$sec->name_file}}" style="cursor: pointer; width: 5%;"/>
			<br>
			<img src="{{asset('images/icons/trash.svg')}}" wire:click="delet({{$sec->id}})" title="Eliminar" style="cursor: move; width: 3%;">	
		</div>	
	<?php }?>
@endforeach
</div>
<br>

<div style="display: flex;">
	<?php $i=0; ?>
	@foreach($secc as $sec)	
		<?php $i= $i+1; ?>
		<?php if(Str::endsWith($sec->file,['docx','.doc'])){?>
			<div style="display: block;" align="center">
				<label><b>Doc <?php echo $i; ?>:</b>
					<span class="text-info">{{$sec->name_file}}</span>	
					<img src="{{asset('images/icons/trash.svg')}}" wire:click="delet({{$sec->id}})" title="Eliminar" style="cursor: move; width: 3%;">	
				</label>&nbsp;&nbsp;
			</div>
		<?php }?>
	@endforeach
</div>


<!-- 		<div align="center" class="form-gruop">
			<div  class="">
				<label >{{$lec->texto}}</label>
			</div>
			@if ($lec->url)
				<b>Visite:</b> <a target="_blank" href="{{$lec->url}}">{{$lec->url}}</a>
			@endif
		</div>
	 -->	


<br><br><br>
		<div class="row">
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label form="downloads">Adjuntar archivo(s)</label>
						@for($i = 0; $i < $fields; $i++)
							<input type="file" id="downloads" wire:model="files" class="form-control mb-2" accept=".png, .jpg, .jpej, .mp3, .pdf, .mp4, .MPEG-4, .zip, .rar, .doc, .docx">
						@endfor					
					</div>
					<div class="form-group">
						<a href="#" class="btn btn-primary" wire:click.prevent="AddField"><b>Add +</b></a>
					</div>
				</div>
			</div>

			<div class="form-group">
		    	<label class="text-primary display-6">¿Tienes un sitio web para a compartir?</label>
		    	<input type="url" wire:model.lazy="url" class="form-control"  placeholder="https://www.google.com/">
			</div>

				<div align="center" class="form-group">
		    	<label>Nota
		    		<textarea class=" form-control" wire:model.lazy="texto" rows="3"  cols="200" placeholder="Escriba informacion que considere importante o de referencia para esta seccion"></textarea>
		    	</label>

			</div>

			<div class="form-group">
				<label class="display-6 text-primary">Visible
					<input type="radio" id="public" wire:model="visibility" value="1"></label>
				<label class="display-6 text-danger"> No aun
					<input type="radio" id="public" wire:model="visibility" value="0"> </label>
				@error('visibility')
					<label class="alert-danger">¿Inique si estara visible o no?</label>
				@enderror
			</div>

		</form>
	</div>
	<input type="text" wire:model="edit" value="1" class="d-lg-none">
    <div align="center">
    	<button wire:click="upload_save" class="btn btn-success btn-block">Subir y Guardar información</button>
    </div>

     <div align="left" style="margin-left:60%;">
	<a wire:click="back" title="ir atras">
	   <img src="{{ asset('images/icons/back.png') }}"  class="irAtras"></a> 
	</div>

</div>


</div>
