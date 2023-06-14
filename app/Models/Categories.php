<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public const RELIEF = 'Relief';
    public const HYDROGRAPHIE = 'Hydrographie';
    public const MONUMENTS = 'Monuments';
    public const POPULATION = 'Population';
    public const INSOLITE = 'Lieux insolites';

    public static function categories(): array
    {
        return [
            self::RELIEF,
            self::HYDROGRAPHIE,
            self::MONUMENTS,
            self::POPULATION,
            self::INSOLITE,
        ];
    }

    public function question(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function carte(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Carte::class);
    }

    public $timestamps = false;
}
