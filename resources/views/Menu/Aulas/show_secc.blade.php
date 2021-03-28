<div  class="form-gruop" align="center" style="margin-top: 2%;">
	<div align="left" class="text-success display-6">
		Leccion: {{$show}}	
	</div>	
	<div style="margin-top: 2%; width: 100%; display: flex;">
		<h1 class="text-center display-5 text-primary" style="margin-top: 10%;">{{$curso->title}}</h1>
		@if($curso->img)
	   		<img src="{{ Storage::url("$curso->img") }}" alt="imagen no disponible" class="img-curs-aula-2"/> 
		@endif
	</div>
	<div  align="right">
		<a wire:click="back" title="ir atras">
	   <img src="{{ asset('images/icons/back.png') }}"  class="irAtras"></a> 
	</div>
</div>
<div style="margin-left: 20%; margin-right: 20%; margin-top: 2%;">
	<div  style="display: flex;">
		@foreach($files as $f)
			<?php if(Str::endsWith($f->file,['.png','.jpg','.jpeg'. '.bmp', '.gim'])){	?>
				<div align="center">
					<img src="{{ Storage::url("$f->file") }}" alt="imagen no disponible" class="display-7 img-file-aula" 
					style="cursor: pointer" title="{{$f->name_file}}"/>
					<a href='/storage/{{$f->file}}'>ver/download</a>
				</div>			
			<?php }?>				
		@endforeach
	</div>
<br>
	<div>
		@foreach($files as $s)
			<?php if(Str::endsWith($s->file,['.mp4','.MPEG-4', '.mwv', '.avi'])){	?>
					<div align="center">
						<video  id="video-curs" controls loop>
							<source src="{{ Storage::url($s->file)}}" type="video/mp4">
						</video>
					</div>	
			<?php }?>
		@endforeach
		</div>
<br>
		<div style="display: flex;" align="center">
		@foreach($files as $s)
			<?php if(Str::endsWith($s->file,'.pdf')){	?>
				<div>
					<a target="_blank" href="{{ Storage::url($s->file)}}">{{$s->name_file}}
						<img src="{{ asset('images/icons/PDF.png') }}" style="cursor: pointer; width: 10%;"/>
					</a>
				</div>	&nbsp;&nbsp;
			<?php }?>
		@endforeach
		</div>
<br>
		<div style="display: flex;">
		<?php $i=0; ?>
		@foreach($files as $s)
			<?php if(Str::endsWith($s->file,['docx','.doc','.text',])){?>
				<div>
					<a target="_blank" href="{{ Storage::url($s->file)}}">{{$s->name_file}}
						<img src="{{ asset('images/icons/DOC.png') }}" style="cursor: pointer; width: 10%;"/>
					</a>
				</div>	&nbsp;&nbsp;
			<?php }?>
		@endforeach
		</div>
<br>		
		<div style="display: flex;">
		<?php $i=0; ?>
		@foreach($files as $s)
			<?php if(Str::endsWith($s->file,['.zip', '.tar'])){?>
				<div >
					<a target="_blank" href="{{ Storage::url($s->file)}}">{{$s->name_file}}
						<img src="{{ asset('images/icons/zip.png') }}" style="cursor: pointer; width: 10%;"/>
					</a>
				</div>	&nbsp;&nbsp;
			<?php }?>
		@endforeach
		</div>
<br><br>
		<div align="center" class="form-gruop">
			<div  class="">
				<label>{{$lecc->texto}}</label>
			</div>
			@if ($lecc->url)
				<b>Visite:</b> <a target="_blank" href="{{$lecc->url}}">{{$lecc->url}}</a>
			@endif
		</div>

</div>



</div>