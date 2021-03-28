<?php

namespace App\Http\Controllers\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Clase;
use App\Curso;
use App\Leccion;
use App\FilesLeccion;
use Auth;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Atr;
use App\Http\Controllers\Livewire\Storage;

class ClassAdminComp extends Component
{
	use WithFileUploads;

	public $class_select = true, $curs, $edit, $create, $cursos, $curso, $curso_id, $title, $seccion;
	public $files=[], $url, $texto;
	public $fields, $save, $secc, $NroCS;
	public $mensaj, $list, $exist, $image, $busc, $upload, $delet, $visibility;
	public $class, $clases, $name, $file, $lecs, $fil, $lec;




    public function render()
    {
        return view('livewire.class-admin-comp');
    }

    public function mount(){
    	$cursos = Curso::all();
    	$this->cursos = $cursos;
    	$this->fields = 1;
    }



	public function change_curso(){
		$this->create = '';
		$this->seccion = '';
		$curso = Curso::find($this->curso_id);
		$this->curs = $curso;
		$this->mensaj = '';
	}

	public function verif(){
		$this->validate([ 'curso_id' => 'required', 'seccion' => 'required' ]);
		if($this->curso_id and $this->seccion){
			$busc = Leccion::where('clase_id',$this->curso_id)
			->where('leccion',$this->seccion)->first();
			if($busc){
				$this->create = '';
				$this->edit = '';
				$this->mensaj = true;
			}else{
				$curso = Curso::find($this->curso_id);
			 	$this->title = $curso->title;
			 	$this->seccion = $this->seccion;
				$this->create = true;
				$this->mensaj = '';
				$this->edit = '';
			}
		}	
	}




	public function edit(){
		$this->edit = true;
		$this->mensaj = '';
		$this->class_select ='';
		$curso = Curso::find($this->curso_id);
		$this->curso = $curso;
		$class = Clase::where('curso_id','=',$this->curso_id)->first();
		$lec = Leccion::where('clase_id','=',$class->id)->where('leccion','=',$this->seccion)->first();
		$this->lec = $lec;
		$secc = FilesLeccion::where('leccion_id','=',$lec->id)->get();
		$this->secc = $secc;	

		$this->texto= $lec->texto;
		$this->url = $lec->url;  	
	}




       	// $Extimg = Str::endsWith($file,'.png');
        	//seccMP4 = Str::endsWith($upload,['.mp4','MP4','mpeg-4','.MPEG-4','gif','GIF','ico']);
        	// $Extdoc = Str::endsWith($upload,['.doc','.docx','pptx','.pdf','.txt','.xml','.opt','.zip','rar']);
			// if($Extimg){
			// 	$save->image = $upload;
			// 	$save->save();
			// }

			// if($Extvideo){
			// 	$save->video = $upload;
			// 	$save->save();
			// }
			// if($Extdoc){
			// 	$save->doc = $upload;
			// 	$save->save();
			// }














	public function list(){
		$this->class_select = '';
		$this->edit = '';
		$this->create = '';
		$clases = Clase::all();
    	$this->clases = $clases;
    	$lecs = Leccion::all();
    	$this->lecs = $lecs;
    	$this->list = 1;
  //   	$list = Leccion::select('clase_id')->groupBy('clase_id')->get();
		// $this->le = $list; 

	}

	public function ver_edit_lec(){

		//$cont = collect($lecs)->pluck('leccion')->countBy();//CONTAR y AGRUPAR
		// $frutas= FilesLeccion::select('leccion_id')->groupBy('leccion_id')->get();
		// $this->fil = $frutas; 
	}







public function back(){
	$this->class_select = true;
	$this->seccion ='';
	$this->curso_id = '';
	$this->edit = '';
}




public function dejar(){
	$this->create='';
	$this->mensaj = '';
	$this->show_edit = '';
}



public function AddField(){
	$this->fields = $this->fields+1;
//	$this->validate([  'files'=>  'string'  ]);
}









public function upload_save(){
	$this->validate(['files'=>  'max:4096' , 'visibility'=>'required'  ]);
	//validar nombres de files correctos
	$class = Clase::where('curso_id','=',$this->curso_id)->first();
	if(empty($class)){
	   	$class = Clase::create([
			'curso_id' => $this->curso_id,
			'user_created' => Auth::user()->id
			 ]);
	}

	if($this->edit){
		$secc = Leccion::where('clase_id','=',$class->id)->where('leccion','=',$this->seccion)->first();		
			$secc->clase_id = $class->id;
			$secc->leccion = $this->seccion;
			$secc->url = $this->url;
			$secc->texto = $this->texto;
			$secc->visibility = $this->visibility;
			$secc->user_updated = Auth::user()->id;
			$save = $secc->save();
		if($this->files){
			foreach ($this->files as $file) {
				$imgName = $file->getClientOriginalName();
				//$this->name = $imgName;
				$upload = $file->store('Files');
				$save = FilesLeccion::create([
					'leccion_id' => $secc->id,
					'file' => $upload,
					'name_file' => $imgName
					]);
			}
		}
		if($save){
			$this->default();
			return back()->with('mensaje','Actualizados correctamente');
		}else{
		    $this->default();
		    return back()->with('error','datos no actualizados');
		}	
	}else{
			$save = Leccion::create([
			'clase_id' => $class->id,
			'leccion' => $this->seccion,
			'url' => $this->url,
			'texto' => $this->texto,
			'visibility' => $this->visibility,
			'user_created' => Auth::user()->id
			]);

		if($this->files){
			foreach ($this->files as $file) {
				$imgName = $file->getClientOriginalName();
				//$imgName = str_random(6).'_'.$file->getClientOriginalName();

				//$this->name = $imgName;
				$upload = $file->store('Files');
				$save = FilesLeccion::create([
					'leccion_id' => $save->id,
					'file' => $upload,
					'name_file' => $imgName
					]);
			}
		}
		if($save){
			$this->default();
			return back()->with('mensaje','Registro Guardado');
		}else{
		    $this->default();
		    return back()->with('error','datos no registrados');
		}
			 // $file = $this->file;
			  //   // $imgExt = $this->file->getClientOriginalExtension();
			  //   $imgName = $file->getClientOriginalName();
			 //    $this->name = $imgName;
   	}
}






public function delet($id){
	// Leccion::delete(file_path);
	$file_db = FilesLeccion::find($id);
	$delet = $file_db->delete();
	$this->edit();



	//Storage::delete($file_db->file);
	//return store::disk('public')->delete('URL'.$file_db->file);
}

public function clear(){
	$this->url='';
	$this->texto='';
}

public function default(){
	$this->create = '';
	$this->mensaj = '';
	$this->edit = '';
	$this->curso_id ='';
	$this->seccion = '';
	$this->texto = '';
	$this->files = '';
	$this->url = '';
	$this->visibility ='';
	$this->class_select = true;
	$this->curso = '';
}








}