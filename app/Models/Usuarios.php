<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Usuarios extends Model
{

    public $table = 'users';    
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
        'photo'
    ];


}
