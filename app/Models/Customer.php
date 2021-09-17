<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='customers';

    protected $fillable = [
        'cedula',
        'nombre',
        'direccion',
        'estado',
        'telefono',
    ];

    public function caso()
    {
        return $this->hasMany('App\Caso');
    }
}
