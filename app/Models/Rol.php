<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rollen';
    public $timestamps = false;

    public function permissies()
    {
        return $this->belongsToMany(Permissie::class, 'rol_permissie', 'rol_id', 'permissie_id');
    }
}
