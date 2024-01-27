<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Casos extends Model
{

    public $table = 'casos';    
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'titulo',
        'descripcion',
        'estado',
        'users_id',
        'fecha_creacion'
    ];


}
