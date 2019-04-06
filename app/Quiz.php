<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'titulo'
    ];

    public function preguntas()
{
	return $this->hasMany('App\Pregunta');
}

    
}
