<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    const M = "Masculino";
    const F = "Femenino";

    //relacion uno a uno
    public function courses(){
        return $this->hasMany('App\Models\Course');
    }

    
    //relacion uno a muchos inversa
    public function teacherType(){
        return $this->belongsTo('App\Models\TeacherType');
    }

}
