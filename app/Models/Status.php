<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $table = 'statussen';
    protected $fillable = ['naam'];
    public function vacatures(): HasMany
    {
        return $this->hasMany(Vacature::class);
    }
}
