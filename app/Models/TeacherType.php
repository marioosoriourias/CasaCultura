<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherType extends Model
{
    use HasFactory;

    //relacion uno a muchos
    public function teachers(){
        return $this->hasMany('App\Models\Teacher');
    }

}
