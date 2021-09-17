<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    protected $table='lawyers';

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
    ];


    public function  casos(){
        return $this->belongsToMany('App\Caso','case_lawyers')->withTimestamps();
    }

}
