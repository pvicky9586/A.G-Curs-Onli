<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visits';
    protected $fillable = ['usuario_id', 'visita'];  

    public $timestamps = false;

    protected $casts = [
		'visita' => 'datetime:Y-m-d'
	];



}
