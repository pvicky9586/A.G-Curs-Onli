<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Curso;
use App\Participant;
use App\Incription;
use App\IncriptionPago;
use App\Comment;
use Auth;



class MenuCursosInscComments extends Component
{
	use WithPagination;
	protected $paginationTheme = 'bootstrap';
	//public $cedula, $name;
	
	public $curso, $curso_id, $view = 0, $viewcomment;
	public $cedula, $name, $last_name, $email, $telef, $NroWp, $meth_pago, $pago; //
	public $comments, $comment,$emailCom, $nameCom;
	// public $part, $part_id,$CursoPartInsc;

	function mount(){
		$comments=Comment::all();
			$this->comments=$comments;
	}

    public function render()
    {    
		return view('livewire.menu-cursos-insc-comments',[
          'cursos'=>Curso::published()->orderBy('id','desc')->paginate(4) 
		]);

		// return view('livewire.menu-cursos-inscripcion',[
  		//     'cursos'=>Curso::where('statud', '=', 1)->orderBy('id','desc')->simplepaginate(4) 
		// ]);
    }
    
    public function insc($id){
		$curso = Curso::find($id);		
			$this->view = 1;
			$this->curso = $curso;
			$this->curso_id = $curso->id;
	}

	public function verif(){ 
	  		  
	 	  $part = Participant::where('cedula','=',$this->cedula)->first();
		   if ($part)  {
		   		$this->name = $part->name;
		   		$this->last_name = $part->last_name;			    
		   		$this->telef = $part->telef;
		   		$this->email = $part->email;
		   		$this->NroWp = $part->NroWp;
			    return back()->with('alert','Datos ya Registrados');	
			} 			
	}

	public function saveinsc(){
	// $this->curso_id;//$this->curso_id'';
		$this->validate([
			'cedula' => 'required|max:10',
			'name' => 'required',
			'last_name' => 'required',
			'meth_pago' => 'required',
			'pago' => 'required',
			'email' => 'required|email'
		 ]);
		$part = Participant::where('cedula','=',$this->cedula)->first();
		if (!$part){
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
		}else {
		 	if(Auth::user()){
		 		$part->user_updated = Auth::user()->id;
		 		//$part->save();
			}
			$part->name = $this->name;
			$part->last_name = $this->last_name;	
			$part->email = $this->email;
			$part->telef = $this->telef;                                          
			$part->NroWp = $this->NroWp;
			$part->save();						
		}
		$Buscpart = Participant::where('cedula','=',$this->cedula)->first(); //vuelve a buscar 
		//$this->part= $Buscpart->id; 
		$CursoPartInsc = Incription::where('curso_id','=',$this->curso_id)
							->where('part_id','=',$Buscpart->id)->first(); 
		// $this->PartInsc=$PartInsc;
		if ($CursoPartInsc){
			// $this->CursoPartInsc = $CursoPartInsc;
			return back()->with('mensaje','Ya se encuentra adscrito en este curso, contactanos para mas informacion');
		}else{   
			$insc = Incription::create([ 
				'part_id' => $Buscpart->id,		
				'curso_id' => $this->curso_id,
				'conf' => 0,
			 ]);
			if(Auth::user()){
				$insc->user_created = Auth::user()->id;
				$insc->save();		
			}

			// $pago = IncriptionPago::create([
			// 'incription_id' => $insc->id,
			// 'meth_pago' => $this->meth_pago,
			// 'pago' => $this->pago 		
			// ]);

			 //RELACION CON ELOQUENT 
			 $pago = $insc->pago()->create([
				'incription_id' => $insc->id,
				'meth_pago' => $this->meth_pago,
				'pago' => $this->pago 		
				]);
			if(Auth::user()){
				$pago->user_created = Auth::user()->id;
				$pago->save();		
			}

			$this->default();
		}
		$this->view = 0;
		return back()->with('mensaje','WELCOME TO THE COURSE');
		
	}
	
 	public function comment($id){
  		$curso = Curso::find($id);
  		$this->curso_id = $curso->id;
 		$this->viewcomment = 3; 		
 	}

 	public function savecomment(){

 		$this->validate([ 'nameCom' => 'required', 'emailCom' => 'required|email', 'comment' => 'required']);
 		$SaveCom = Comment::create([
		'name' => $this->nameCom,
		'email' => $this->emailCom,	
		'comment' => $this->comment,
		'curso_id' => $this->curso_id	
		]);
		$this->default();
		$this->mount();
		$this->viewcomment = '';
		// return $this->render(); 
		return back()->with('comment','Nuevo comentario añadido');	
			
 	}


	public function default(){
		$this->cedula = '';
		$this->name = '';
		$this->email = '';			
		$this->last_name = '';
		$this->id_curso = '';
		$this->Met_pago = '';
		$this->pago = '';
		$this->email = '';
		$this->telef = '';
		$this->NroWp = '';	
		$this->nameCom = '';
		$this->emailCom = '';
		$this->comment = '';
	}

	public function close(){
		$this->view = 0;
	}


    
    
}










