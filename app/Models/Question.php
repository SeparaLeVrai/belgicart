<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'difficulte_id',
        'categorie_id',
    ];

    public function difficultes(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Difficulte::class, 'difficulte_id')->withDefault(['level', 'Débutant']);
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Categories::class, 'categorie_id')->withDefault(['nom', 'Aléatoire']);
    }

    public $timestamps = false;
}
