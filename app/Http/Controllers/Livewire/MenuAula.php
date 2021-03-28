<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use App\Curso;
use App\Participant;
use App\Incription;
use App\UserAulas;
use App\Visit;
use App\Clase;
use App\Leccion;
use App\FilesLeccion;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon\Carbon;

class MenuAula extends Component
{

	public $iniciar=true, $cursos, $curso, $part; //view de inicio
	public $continue, $valid, $logeat, $regist, $verif, $show_secc; //view
	public $curso_id, $decid; //si curso_id decid si esta o no registrado 
	public $usuario, $password, $password_confirmation, $email; //view regist
	public $insc; //view insc inscrito
	public $UserAula; 
	public $cedula; //view verif
	public $part_id; //view insc
	public $auth, $failAuth; //auhtenticacion
	public $seccions, $clas, $lec, $show, $cont;
	public $aula, $files, $lecc; //view aula bienvenido
	

	public function mount(){
		$cursos = Curso::all();
		$this->cursos = $cursos;
	}






    public function render()
    {
        return view('livewire.menu-aula');
        // return view('livewire.menu-aula', [
        // 	'aulas' =>Aula::orderBy('id','desc')->paginate(5) 
        // ]);
	}

	public function continue(){
		$this->continue = true;
	}

	public function decid(){
		$curso = Curso::find($this->curso_id);
		$this->curso_id = $this->curso_id;
		$this->decid = true; //pregunta si esta loguado  o no
	}



	public function regist($id){
		$curso = Curso::find($this->curso_id);
		$this->curso_id = $this->curso_id;	
		$this->logeat = '';	
		$this->verif = true;
		
	}



public function back(){
	$this->aula = true;
	$this->edit='';
	$this->show_secc='';
}







	public function verif($id){ 
		$this->validate(['cedula' => 'required']); 
		$part = Participant::where('cedula',$this->cedula)->first();
		if ($part)  {
			$this->part = $part;	
			$this->part_id = $part->id;
		 
			$insc = Incription::where('part_id',$part->id)->where('curso_id',$this->curso_id)->where('conf', 1)->first();
			if($insc){
			  	
			  	$UserAula = UserAulas::where('part_id',$part->id)->where('curso_id',$this->curso_id)->first();
			  	if ($UserAula){
			  		$this->UserAula = true;
			  		$this->insc = true;		
			  	}else{ //registrarse llama a view
			  		$this->regist = true;
			  	}
			  	
			}else{
			  	
				return back()->with('alert', 'disculpe no esta inscrito en el curso, o debe esperar sea  "validada" su inscripcion');
			}
		}else{
			$this->regist = '';
			$this->continue = '';
			return back()->with('alert', 'Disculpe!, no esta registrado');
			 		  //return back()->with('alert','Datos ya Registrados');
		}

	}
	
	






















	public function saveregistro(){

		$this->validate([
        'usuario' => 'required|min:5|max:10|unique:user_aulas',
        'password' => 'required|min:5|max:10|confirmed',
        ]);

  		 $NewAula = UserAulas::create([
		 // 'part_id' => $part->id,
		 // 'curso_id' => $this->curso_id,
		 'clase_id' => $this->curso_id,		
		 'usuario' => $this->usuario,
		 'email' => $this->email,
		 'password' => bcrypt($this->password)	
		 ]);

	
		// $NewAula = new UserAulas;
  //       $NewAula->part_id = $this->part_id;
  //       $NewAula->curso_id = $this->curso_id;
  //       $NewAula->curso_id = $this->curso_id;
  //       $NewAula->email = $this->email;
  //       $NewAula->usuario = $this->usuario;
  //       $NewAula->password = bcrypt($this->password);
		// $NewAula->save();
		if($NewAula){
			$visita = Visit::create([
				'usuario_id' => $NewAula->id,
				'visita' => now()->toDateTimeString()
			]);
			$this->curso_id = $curso_id;
			//INSERT EN TABLA usuario_clases usuario_id y clase_id

			//ACCEDIENDO ATRAVEZ DEL REGISTRO
			$this->auth = $NewAula;
			$this->aula = true;			
													
			$clas = Clase::where('curso_id',$this->curso_id)->first();

			$lec = Leccion::where('clase_id', $clas->id)->where('visibility','=', 1)->get();
			$this->lec = $lec;
			$this->default();
		}else{
			return brack()->with('alert','ocurrio un error verifique!');
		}
	}


	public function aula($id){
		$this->aula = true; //ACCEDIENDO atraves del registro
		$clase = Clase::where('curso_id',$this->curso_id)->first();
		// $part = Participant::where('cedula',$this->cedula)->first();
		$this->clase = $clase;
	}
		
		// $this->aulaExiste='';
		// $this->reg='';
		// $this->acceder='';
		// $this->ir='';
		
		//return back()->with('mensaje','Datos Registrados');
    



	public function logeat($id){
		$curso = Curso::find($this->curso_id);	
		$this->verif = '';	
		$this->regist = '';
		$this->cedula = '';
		$this->logeat = true;
		$this->curso = $curso;		
		// $this->curso_id = $curso->id;
	}














	public function Acceder(){	
		$login = $this->usuario;

		//$usua= UserAulas::all();
		$field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'usuario';		
		$auth = UserAulas::where('usuario',$this->usuario)
		->orWhere('email',$this->usuario)
		->where('password',$this->password)->first();
		//	$this->auth = $auth;
		if($auth){
			$visita = Visit::create([
				'usuario_id' => $auth->id,
				'visita' => now()->toDateTimeString()
			]);
			$this->auth = $auth;
			// select todas las secciones de este curso
			// consultar tabla usuario_clases para traer los usuario de dicha clases segun en curso seleccionado 		
			$clas = Clase::where('curso_id',$this->curso_id)->first();

			$lec = Leccion::where('clase_id', $clas->id)->orderBy('id','desc')->get();
			$this->lec = $lec;

			//$cont = collect($lec)->pluck('leccion')->countBy();//CONTAR y AGRUPAR
			// $frutas= Leccion::select('seccion')->groupBy('seccion')->get();
			// 	$this->nro = $frutas; //

			// $countSec = Leccion::where('clase_id', $clas->id)->where('visibility','=', 1)->count();
			// $this->countSec = $countSec;


			//$aula = 'SELECT * FROM user_aulas';
	        // $aula = DB::select('SELECT * FROM seccions');
	        // $this->aula = $aula;

			$this->iniciar = false;
			$this->continue = '';
			$this->valis = '';
			$this->regist = '';
			$this->logeat = '';
			$this->aula = true; //accediendo a traves del login
		}else{

			$this->failAuth='Fallo Autenticación, verifique';
		}
		
		//return [ $field => $login,	'password' => $this->password	];
		//$this->default();

	
		
	}



	public function show_secc($id){
		$this->aula = '';
		$this->show_secc = true; 
		$this->show = $id;
		$clas = Clase::where('curso_id',$this->curso_id)->first();
		$lecc = Leccion::where('clase_id', $clas->id)->where('leccion',$id)->where('visibility','=', 1)->first();
		$this->lecc = $lecc;
		$files = FilesLeccion::where('leccion_id',$id)->get();
		$this->files = $files;
	

		}






























	public function default(){
		$this->iniciar = false;
		$this->continue = '';
		$this->valis = '';
		$this->regist = '';
		$this->logeat = '';
		$this->verif = '';
		$this->usuario = '';
		$this->password = '';	
	}

		public function clear(){
		$this->email = '';
		$this->usuario = '';
		$this->password = '';	
	}














}