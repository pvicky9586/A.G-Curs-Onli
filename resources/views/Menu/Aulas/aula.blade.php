<div  class=" form-gruop" align="center" style="margin-top: 2%;">
	<h1 class="display-4 font-italic">BIENVENIDOS</h1>


	<div align="right" class="text-success display-6">
		{{$auth->usuario}}	
	</div>
	<div style="margin-left: 10%; margin-right: 10%; margin-top: 2%;">
		<h1 class="text-center display-5 text-primary text-uppercase"  style="margin-top: 1%;">{{$curso->title}}</h1>
		@if($curso->img)
	   		<img src="{{ Storage::url("$curso->img") }}" alt="imagen no disponible" class="img-curs-2"/> 
		@endif
	</div>
<div class="container">
	<div class="form-group" style="margin-top: 2%;">
		<ul class="two">
		@foreach ($lec as $l)			
			 <li class="">
				 @if($l->visibility == 0)
				 	<span class="display-6  text-secondary">
				 @else
				 	<span class="display-6 text-primary font-weight-normal" wire:click="show_secc({{ $l->leccion }})" style="cursor: move;">
				 @endif
			 	Leccion {{ $l->leccion }}</span>
			 </li>
		@endforeach
		</ul>
<!-- 	@foreach($lec as $key => $l)
		  <li class="font-weight-normal">
		  		<span class="display-6 text-info " wire:click="show_secc({{ $key+1 }})" style="cursor: move;">Leccion {{ $key+1 }}</span>
		  		<span class="display-7 text-success"><b> {{ $l }}</b> registros</span>
		  </li>
	@endforeach -->
	</div>
</div>


</div>