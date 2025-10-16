<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contactpersoon extends Model
{
    protected $table = 'contactpersonen';
    protected $fillable = [
        'naam',
        'email',
        'telefoon',
        'linkedin',
    ];
    public function vacatures(): HasMany
    {
        return $this->hasMany(Vacature::class);
    }
}
