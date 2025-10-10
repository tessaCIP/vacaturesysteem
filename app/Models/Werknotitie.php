<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Werknotitie extends Model
{
    protected $fillable = [
        'vacature_id',
        'notitie',
        'created_by',
    ];
    public function vacature(): BelongsTo
    {
        return $this->belongsTo(Vacature::class);
    }
}
