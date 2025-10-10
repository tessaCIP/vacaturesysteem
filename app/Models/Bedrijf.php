<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bedrijf extends Model
{
    protected $table = 'bedrijven';
    protected $fillable = [
        'naam',
        'adres',
        'postcode',
        'plaats',
        'email',
        'telefoon',
        'website',
    ];
    public function vacatures(): HasMany
    {
        return $this->hasMany(Vacature::class);
    }
}
