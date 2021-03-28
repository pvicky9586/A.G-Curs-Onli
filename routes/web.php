<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Livewire\ResponsablsComponent;
use Livewire\ParticipantsComponent;
use Livewire\MenuCursosInscComments;
use Livewire\InscriptionComp;

//use Illuminate\Support\Str;
// use App\Incription;
// use App\User;
// use App\Profession;
// use App\Curso;

// Route::get('/menu', function () {
//     return view('menu');
// })->name('menu');


Route::get('/', function () {
    return view('Menu.home');
})->name('welcome');

Route::get('/nosotros', function () {
    return view('Menu.nosotros');
})->name('nosotros');		



Route::get('/aula-virtual', function() {
	return view('Menu.Aulas.index');
})->name('aulas');


Route::get('/ideas', function () {
    return view('Menu.ideas.ideas');
})->name('ideas');	

Route::get('/tienda', function () {
    return view('Menu.tienda');
})->name('tienda');


//integradas rutas al componente MenuCursosInscComments 
Route::get('/cursos/{id?}', function () {   
    return view('Menu.Cursos_Insc_Comm.index');
})->name('cursos.index');

// Route::get('/cursos/{id?}', MenuCursosInscComments::class)->name('cursos.index');




// Route::get('/key',function(){
// 	$key = Str::random(32);
// 	return $key;
// });


Route::get('/storage/{file}' , 'Controller@downloadFile');


//---------USER
Auth::routes();

// RUTAS PRITEGIDAS (ADM)

Route::get('/auth/AdmUsers/tool', 'Auth\RegisterController@index')->name('AdmUser');
Route::get('/auth/AdmUser/detalle/{id}', 'Auth\RegisterController@ver')->name('ver');
Route::get('/auth/register', 'Auth\RegisterController@create')->name('create');
Route::post('/auth/register', 'Auth\RegisterController@saveUser')->name('saveUser');

Route::post('/auth/login', 'Auth\RegisterController@create')->name('createUser');




Route::get('/admin-cursos','CursController@index')->name('cursos');
Route::get('/detaill-curso/{id}', 'CursController@show')->name('detaill');
Route::get('/new-curso', 'CursController@create')->name('Newcurso');
Route::post('/new-curso','CursController@store')->name('SaveCurso');
Route::get('/edit-curs/{id?}', 'CursController@edit')->name('EditCurs');
Route::put('/edit-curs/{id}','CursController@update')->name('UpCurso');


//rutas livewire Protegidas (ADMIN)
Route::middleware('auth:web')->group(function () {

    Route::get('/privileged-user', function(){
		return view('Admin.tool');
	})->name('Admin');


    Route::get('/Responsabls',function(){
		return view('Admin.responsabls/index');
	})->name('resp-livew');
	                           	
	Route::get('/Participants',function(){	
		return view('Admin.participants.index');
	})->name('part-livew');
    // // Route::get('/Admin.responsabls', ResponsablsComponent::class)->name('resp-livew');
    // Route::get('/Admin.participants', ParticipantsComponent::class)->name('part-livew');


	Route::get('/Admin-class', function() {
		return view('Admin.Class.index');
	})->name('class');

	
	Route::get('/admin-inscription',function(){
		//$reg = App\Incription::with('curs')->get();		
		return view('Admin.Inscrip.index');
	})->name('insc-auth');
	

	Route::get('/Admin.inscription', InscriptionComp::class,'destroy');

	Route::get('/Admin.inscription/{id}', 'PdfController@ConfPDF')->name('ConfPDF');
    
});



















		





// Route::get('/orm', function(){
// 	$curso = Curso::find(1);

// 	$curso->comments;
// 	return $curso;

// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
