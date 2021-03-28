<div class="form-group form-2">
	<label class="text-center display-6 text-primary">{{$title}}</label><br>
	<label class="text-right display-5 text-success"><b>Seccion: <b>{{$seccion}}</label>
	
	<div class="text-center display-5">Subir recursos a esta seccion del curso
		<p class="display-7 text-danger">formatos permitidos '.png, .jpg, .jpej, .mp3, .doc, .docx, .xml, .pdf, .mp4, .MPEG-4, .zip, .rar
		</p>
	</div>

<!-- 	  {{$name}} -->


	<form wire:submit.prevent="upload_save" enctype="multipart/form-data">

			<div class="row">
				<div class="col-md-6">
					<div class="form-group mb-4">
						<label form="downloads">Adjuntar archivo(s)</label>
						@for($i = 0; $i < $fields; $i++)
							<input type="file" id="downloads" wire:model="files" class="form-control mb-2" accept=".png, .jpg, .jpej, .mp3, .pdf, .mp4, .MPEG-4, .zip, .rar, .doc, .docx">
							
						@endfor
					@error('files')
								<label class="alert-danger">¡Nombre de archivo no valido!</label>
							@enderror
					</div>
					<div class="form-group">
						<a href="#" class="btn btn-primary" wire:click.prevent="AddField"><b>Add +</b></a>
					</div>
				</div>
			</div>


			<div class="form-group">
		    	<label class="text-primary display-6">¿Tienes un sitio web para a compartir?</label>
		    	<input type="url" wire:model="url" class="form-control" placeholder="https://www.google.com/">
			</div>

			<div align="center" class="form-group">
		    	<label>Nota
		    		<textarea class="nav-link form-control" wire:model="texto" rows="3"  cols="200" placeholder="Escriba informacion que considere importante o de referencia para esta seccion"></textarea>
		    	</label>
			</div>
			<div class="form-group">
				<label class="display-6 text-primary">Visible<input type="radio" id="public" wire:model="visibility" value="1"></label>
				<label class="display-8"> No aun<input type="radio" id="public" wire:model="visibility" value="0"> </label>
				@error('visibility')
					<label class="alert-danger">¿Inique si estara visible o no?</label>
				@enderror
			</div>
		<div>
    		<button type="submit" class="btn btn-primary btn-block">Subir y Guardar información</button>
    		<button wire:click="clear" class="btn btn-warning">Limpiar</button>
    	</div>
    </form>
</div>






</div>
