<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tema extends Model
{

    protected $fillable = ["titulo", "anyo", "duracion"];

    public function albumes(): BelongsToMany
    {
        return $this->belongsToMany(Album::class);
    }

    public function artistas(): BelongsToMany
    {
        return $this->belongsToMany(Artista::class);
    }
    public function formatear() {
        $segundos = $this->duracion;
        $minutos = floor($segundos / 60);
        $segundosRestantes = $segundos % 60;
        if($segundosRestantes){
            return "$minutos minutos y $segundosRestantes segundos";

        }else{
            return "$minutos minutos";
        }
    }

    use HasFactory;
}
