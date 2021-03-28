<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $table = 'clases';
    protected $fillable = ['curso_id', 'user_created', 'user_updated'];


    public function curso()
    {
          return $this->belongsTo(Curso::class);
    }

    public function seccions()
    {
          return $this->hasMany(Seccion::class);
    }

}
