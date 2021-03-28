<?php
//Desd Admin

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use Livewire\WithFileUploads;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;



use App\Incription;
use App\Curso;
use App\Participant;
use Auth;


//Desd Admin
class InscriptionComp extends Component
{

	use WithPagination;

	public $title, $curso_id, $description, $duracion;
	public $ver, $valid;
	public $All_inscs, $parts, $insc_id=[], $Marc;
	public $CursSelec;
	//public $inscSelec, $confir;

	protected $paginationTheme = 'bootstrap';


   public function render()
    {
     //    return view('livewire.inscription-comp',[
     //    	'cursos' => Curso::published()->withCount(['inscs'])->simplepaginate(10) 
    	// ]);
        return view('livewire.inscription-comp',[
  		    'cursos'=>Curso::where('statud', '=', 1)->withCount(['inscs'])->orderBy('id','desc')->paginate(15) 
		]);

    }

	  function mount(){
		$inscs = Incription::all();
    	$this->All_inscs = $inscs;


    	$parts = Participant::all();
    	$this->parts = $parts;	

  //   	$count_parts = Incription::withCount(['part_id'])->get();
		// $this->count_parts=$count_parts;	
	}
	  






  

    public function ConfIns($id) { //ver Inscritos/aspirantes
    	$this->valid = 1;
    	$this->ver = '';  
    	$CursSelec = Curso::find($id);
    	$this->CursSelec = $CursSelec;
			
	}






	public function saveconf($id) { //Save confir 
		// $CursSelec = Incription::where('conf',$CursSelec);
		// $this->CursSelec=$CursSelec;
		
		$cont_insc = Count($this->insc_id);
		// 	$this->CursSelec = $CursSelec;

    	// $this->insc=$this->insc_id;
      for($i=0; $i<$cont_insc; $i++){
         	//$this->confir = $this->insc_id[$i];	
		    $inscSelec = Incription::find($this->insc_id[$i]);
		   	$inscSelec->conf = 1;
			$inscSelec->save();	

		    if(Auth::user()){
			$inscSelec->user_conf = Auth::user()->id;
			$inscSelec->save();		
			}
		
            //$this->inscSelec = $inscSelec;	
    	// return back()->with('conf','confirmado');	
			$this->valid = 1;

    	request () -> session () -> flash ('conf','confirmado');
    	//return  redirect ()->to( '/admin-inscription' );
    	}
	}














	public function ConfSavePDF() {
		
	}




	
	public function ver($id){
			$this->ver = 1;
 	 		$this->valid = '';
 	 		$CursSelec = Curso::find($id);
    		$this->CursSelec = $CursSelec;
    		//return back()->with('mensaje','Lista Actualizada');	
	} 

	 public function destroy($id){	 
		$insc= Incription::destroy($id); 
    	// return back()->with('conf','confirmado');	

    	request () -> session () -> flash ('alert','Eliminado');
        //return  redirect ()->to( '/admin-inscription' );
    	//return back()->with('alert','Borrado de la lista');

	}
	
    
    
    
    
    
    
    
    
    
    
    
    
}
