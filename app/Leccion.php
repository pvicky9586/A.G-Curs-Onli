<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leccion extends Model
{
    protected $table = 'leccions';
    protected $fillable = ['clase_id', 'leccion', 'texto', 'url', 'visibility', 'user_created', 'user_updated'];


    // public function comments()
    // {
    //    return $this->hasManyThrough(Comment::class, Post::class);
    // }


 	public function clase()
    {
          return $this->belongsTo(Clase::class);
    }

     public function files()
	 {
	      return $this->hasMany(FilesLeccion::class);
	 }
}
