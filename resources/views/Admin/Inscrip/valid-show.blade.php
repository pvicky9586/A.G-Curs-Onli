<div>
  <div align="center">
      <img src="{{asset('images/reg.jpg')}}" width="200" height="100">  
       <h1 class="display-6 text-primary text-center">{{$CursSelec->title}}</h1>     
  </div>   
 <label>Listado de aspirantes al curso</label><br><br>

    @if (session('alert'))
          <div class="alert alert-danger">   
             {{ session('alert') }}
          </div>
    @endif
       @if (session('conf'))
          <div class="alert alert-success">             
            {{ session('conf') }}
          </div>
         @endif
      
    <?php $cont=1; ?>
    <?php $si=''; ?>
      @foreach($parts as $part)
       @foreach($All_inscs as $index=>$insc)
        
          @if(($part->id == $insc->part_id) && ($CursSelec->id == $insc->curso_id))
             <?php $si=1; ?>
            <div class="contenedor-div">
            @if($insc->conf == 1)
                  <div  class="form-group text-success" style="border-bottom-color: red 1px;">  
                      <label>
                         {{$part->name}} {{$part->last_name}}   <img src="{{asset('images/icons/checked.jpg')}}" width="30">
                      </label>         
                    <!--   <input type="checkbox" name="conf[]" wire:model="insc_id" 
                      wire:click="saveconf({{ $insc->id }})" id="conf" value="{{$insc->id}}" > -->
                                          
                      
                       
                     <input type="button" value="x" wire:click="destroy({{ $insc->id }})" class="btn btn-danger" style=" float: right;">
                  </div> 
               
          
            @else
                <div class="form-group" style="border-top:2px solid; border-color:#BFBFBF; ">   

                    <input type="checkbox"  name="conf[]" wire:model="insc_id" 
                    wire:click="saveconf({{ $insc->id }})" id="conf" value="{{$insc->id}}" onclick="conf()">
                    {{$part->name}} {{$part->last_name}}

                    <input type="button" value="x" wire:click="destroy({{ $insc->id }})" class="btn btn-warning" style=" float: right;">
                </div> 

            @endif
            </div>
          @endif

        @endforeach
      @endforeach

    <input type="text" wire:model="CursSelec" name="curso" style="visibility: hidden;" value="{{$CursSelec->id}}">
    @if($si==1)
     <a href="{{route('ConfPDF',$CursSelec->id)}}" class="btn btn-success">Imprimir lista</a>
    @else
     <p> <strong>no hay inscritos</strong></p>
    @endif
<!-- wire:click="ConfSave" -->
<!-- wire:click="cancelar"  -->
      
<!-- 
<button wire:click="export">
    Download File
</button> -->



<!-- <label for="test">
  <input type="checkbox" name="test" id="test">
  Pincha aquí
</label>



<script type="text/javascript">
var checkbox = document.getElementById('test');

checkbox.addEventListener( 'change', function() {
    if(this.checked) {
       alert('checkbox esta seleccionado');
    }
});
</script> -->


</div>

