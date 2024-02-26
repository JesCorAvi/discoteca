<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Artista extends Model
{
    protected $fillable = ["nombre"];

    public function temas(): BelongsToMany
    {
        return $this->belongsToMany(Tema::class);
    }
    use HasFactory;
}
