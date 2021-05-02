<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $withCount = ['students'];

    protected $guarded = ['id'];

    //Relacion uno a muchos inversa
    public function teacher(){
        return $this->belongsTo('App\Models\Teacher');
    }


    //relacion uno a muchos inversa
    public function period(){
        return $this->belongsTo('App\Models\Period');
    }

    //RELACION MUCHOS A MUCHOS
    //*
    public function students(){
        return $this->belongsToMany('App\Models\Student')->withPivot('id');;
    }
}
