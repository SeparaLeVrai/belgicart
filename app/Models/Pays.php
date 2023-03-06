<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;

    public const FRANCE = 'France';
    public const BELGIQUE = 'Belgique';

    public static function pays(): array
    {
        return [
            self::FRANCE,
            self::BELGIQUE,
        ];
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }

    public $timestamps = false;
}
