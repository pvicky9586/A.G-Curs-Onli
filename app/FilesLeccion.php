<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilesLeccion extends Model
{
      protected $table = 'files_leccions';
      protected $fillable = [ 'leccion_id', 'file','name_file'];

      public function leccion()
	    {
	          return $this->belongsTo(Leccion::class);
	    }
}
