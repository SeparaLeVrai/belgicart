<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function reponse()
    {
        return $this->hasMany(Reponse::class);
    }

    public function levels(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Difficulte::class);
    }

    public function fields(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }

    public $timestamps = false;
}
