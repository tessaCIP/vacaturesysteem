<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacature extends Model
{
    protected $table = 'aanvragen';
    protected $fillable = [
        'titel',
        'bedrijf_id',
        'aantal_uren',
        'deadline_aanmelden',
        'deadline_reactie',
        'status_id',
        'contactpersoon_id',
        'kandidaat_id',
    ];

    public function bedrijf(): BelongsTo
    {
        return $this->belongsTo(Bedrijf::class);
    }
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
    public function contactpersoon(): BelongsTo
    {
        return $this->belongsTo(Contactpersoon::class);
    }
    public function kandidaat(): BelongsTo
    {
        return $this->belongsTo(Kandidaat::class);
    }
    public function werknotities(): HasMany
    {
        return $this->hasMany(Werknotitie::class);
    }
}
