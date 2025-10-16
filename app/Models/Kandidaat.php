<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kandidaat extends Model
{
    protected $fillable = [
        'naam',
        'cv',
    ];
    public function vacatures(): HasMany
    {
        return $this->hasMany(Vacature::class);
    }
}
