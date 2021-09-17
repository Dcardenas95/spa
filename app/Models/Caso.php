<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    protected $table='casos';

    protected $fillable = [
        'customer_id',
        'state',
        'date_start',
        'date_process',
        'date_end',
    ];

    public function customer(){
        return $this->belongsTo('App\Customer','customer_id');
    }

    public function lawyers(){
        return $this->belongsToMany('App\Lawyer','case_lawyers')->withTimestamps();
    }

}
