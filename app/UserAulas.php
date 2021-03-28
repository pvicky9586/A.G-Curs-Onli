<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAulas extends Model
{	
	protected $table = 'user_aulas';
  protected $fillable = ['part_id', 'curso_id', 'clase_id', 'usuario','email', 'password']; 

  protected $hidden = [ 'password', 'remember_token', ];
  
  public function part()
	{
		return $this->belongsTo(Participant::class);
	}

	public function curso()
    {
       	 return $this->belongsTo(Curso::class);
    }

    // public function visitas()
    // {
    //       return $this->hasMany(Visit::class, 'visits');
    // }

}
