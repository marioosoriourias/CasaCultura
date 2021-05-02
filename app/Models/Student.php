<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    const M = "Masculino";
    const F = "Femenino";


    //RELACION MUCHOS A MUCHOS
    //*
    public function courses(){
        return $this->belongsToMany('App\Models\Course')->withPivot('id');;
    }
}
