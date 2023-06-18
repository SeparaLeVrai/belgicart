<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;

    public const FRANCE = 'France';
    public const BELGIQUE = 'Belgique';
    public const ALLEMAGNE = 'Allemagne';
    public const ROYAUMEUNI = 'Royaume-Uni';
    public const PAYSBAS = 'Pays-Bas';
    public const LUXEMBOURG = 'Luxembourg';

    public static function paysFr(): array
    {
        return [
            self::FRANCE,
            self::BELGIQUE,
            self::ALLEMAGNE,
            self::ROYAUMEUNI,
            self::PAYSBAS,
            self::LUXEMBOURG,
        ];
    }

    public const FRANCE2 = 'France';
    public const BELGIQUE2 = 'Belgium';
    public const ALLEMAGNE2 = 'Germany';
    public const ROYAUMEUNI2 = 'United Kingdom';
    public const PAYSBAS2 = 'Netherlands';
    public const LUXEMBOURG2 = 'Luxembourg';

    public static function paysEn(): array
    {
        return [
            self::FRANCE2,
            self::BELGIQUE2,
            self::ALLEMAGNE2,
            self::ROYAUMEUNI2,
            self::PAYSBAS2,
            self::LUXEMBOURG2,
        ];
    }

    public const FRANCE3 = 'Frankrijk';
    public const BELGIQUE3 = 'België';
    public const ALLEMAGNE3 = 'Duitsland';
    public const ROYAUMEUNI3 = 'Verenigd Koninkrijk';
    public const PAYSBAS3 = 'Nederland';
    public const LUXEMBOURG3 = 'Luxemburg';

    public static function paysNl(): array
    {
        return [
            self::FRANCE3,
            self::BELGIQUE3,
            self::ALLEMAGNE3,
            self::ROYAUMEUNI3,
            self::PAYSBAS3,
            self::LUXEMBOURG3,
        ];
    }

    public const FRANCE4 = 'Frankreich';
    public const BELGIQUE4 = 'Belgien';
    public const ALLEMAGNE4 = 'Deutschland';
    public const ROYAUMEUNI4 = 'Vereinigtes Königreich';
    public const PAYSBAS4 = 'Niederlande';
    public const LUXEMBOURG4 = 'Luxemburg';

    public static function paysDe(): array
    {
        return [
            self::FRANCE4,
            self::BELGIQUE4,
            self::ALLEMAGNE4,
            self::ROYAUMEUNI4,
            self::PAYSBAS4,
            self::LUXEMBOURG4,
        ];
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }

    public $timestamps = false;
}
