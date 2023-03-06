<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    use HasFactory;

    public function fields(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }

    public $timestamps = false;
}
