<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Participant;
use App\Curso;
use Auth;

//Desd Admin
class ParticipantsComponent extends Component
{
	
	use WithPagination;
	  
	public $part_id, $cedula, $name, $last_name, $id_curso, $meth_pago, $pago, $email, $telef, $NroWp, $id_part;
	public $view = 'create';
	public $searchPart = '';
	public $part, $mensaje;
	public $InscCurs, $InscPart;
	
    

	protected $paginationTheme = 'bootstrap';


    public function updatingSearch()
    {
        $this->resetPage();
    }



    public function render()
    {
		$cursos= Curso::all();
       return view('livewire.participants-component',compact('cursos'), [
		'parts'=> Participant::where(function($sub_query)
		{
			$sub_query->where('name','like', '%'.$this->searchPart.'%')
			->orWhere('last_name','like', '%'.$this->searchPart.'%');
			})->orderBy('id','desc')->paginate(15) 
		]);
		
		
	}
    public function verif(){    		  
		   $part = Participant::where('cedula','=',$this->cedula)->first();
		   if ($part)  {
		   		$this->name = $part->name;
		   		$this->last_name = $part->last_name;			    
		   		$this->telef = $part->telef;
		   		$this->email = $part->email;
		   		$this->NroWp = $part->NroWp;
			
			    $this->edit($part->id);  
			    $this->view = 'edit';
			    //return back()->with('mensaje','Datos Registrados');
			    request () -> session () -> flash ('mensaje','Datos Registrados');	
			} 			
	}
	  
	  
	  
    public function store() {
		$this->validate(['cedula' => 'required']); 
		 if ($this->email){
			   $this->validate([ 'email' => 'email']);  			 
		 }
		                                           
		$part = Participant::create([
		'cedula' => $this->cedula,
		'name' => $this->name,	
		'last_name' => $this->last_name,
		 'email' => $this->email,
		'telef' => $this->telef,                                          
		'NroWp' => $this->NroWp		
		]);
		if(Auth::user()){
			$part->user_created = Auth::user()->id;
			$part->save();		
		}
		$this->default();
		return back()->with('mensaje','Datos Registrados');			
	}
                                                                
     
     
     
     
    public function edit($id){
		$part= Participant::find($id);
		
		$this->part_id	= $part-> id; 
		$this->cedula = $part->cedula;
		$this->name = $part->name;
		$this->last_name = $part->last_name;  		
		$this->email = $part->email;
		$this->telef = $part->telef;
		$this->NroWp = $part->NroWp;		
		$this->view = 'edit'; 		
	} 
	
	
	
	public function update(){
		$this->validate(['cedula' => 'required']);
		if($this->email){
			$this->validate(['email' => 'email']);
		}

		$part = Participant::find($this->part_id); 		
		$part->update([
			'cedula' => $this->cedula,
			'name' => $this->name,
			'last_name' => $this->last_name, 		
			'email' => $this->email,
			'telef' => $this->telef,
			'NroWp' => $this->NroWp,
		]); 
		if(Auth::user()){
			$part->user_updated = Auth::user()->id;
			$part->save();		
		}

		$this->default(); 
		return back()->with('mensaje','Datos Actualizados');	
	}
	
     
	
   public function destroy ($id){
		Participant::destroy($id);  
	}
	
	public function default(){
		$this->cedula = '';
		$this->name = '';			
		$this->last_name = '';
		// $this->id_curso = '';
		// $this->Met_pago = '';
		// $this->pago = '';
		$this->email = '';
		$this->telef = '';
		$this->NroWp = '';
		$this->profession_id='';
		$this->view = 'create';		
	}
    
    
    
    
    
    
// public function destroy($id)
//   {
//     $team=Team::findOrFail($id);
//     $team->delete();
//     Storage::delete($team->logo);
//     return response()->json(['data' => $team],200);
//   }
// }    
    
    
    
    
    
    
}
