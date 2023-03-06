<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulte extends Model
{
    use HasFactory;

    public const DEBUTANT = 'Débutant';
    public const AMATEUR = 'Amateur';
    public const EXPERT = 'Expert';

    public static function levels(): array
    {
        return [
            self::DEBUTANT,
            self::AMATEUR,
            self::EXPERT,
        ];
    }

    public function question(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Question::class);
    }

    public $timestamps = false;
}
