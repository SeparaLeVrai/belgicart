<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    public const ADMIN = 'Administrateur';
    public const USER = 'Utilisateur';

    public static function niveaux(): array
    {
        return [
            self::ADMIN,
            self::USER,
        ];
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }

    public $timestamps = false;
}
