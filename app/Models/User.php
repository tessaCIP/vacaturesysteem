<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    public function rollen()
    {
        return $this->belongsToMany(Rol::class, 'gebruikers_rol', 'gebruiker_id', 'rol_id');
    }

    public function hasRole($rolNaam)
    {
        return $this->rollen()->where('naam', $rolNaam)->exists();
    }

    public function hasPermission($permissieNaam)
    {
        return $this->rollen()->whereHas('permissies', function ($q) use ($permissieNaam) {
            $q->where('naam', $permissieNaam);
        })->exists();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_confirmed_at' => 'datetime',
        ];
    }
}
