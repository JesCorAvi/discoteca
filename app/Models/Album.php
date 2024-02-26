<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Album extends Model
{
    protected $table = "albumes";
    protected $fillable = ["titulo", "anyo"];

    public function temas(): BelongsToMany
    {
        return $this->belongsToMany(Tema::class);
    }
    use HasFactory;

    public function tiempo(){
        $segundos = 0;
        foreach($this->temas as $tema){
            $segundos += $tema->duracion;
        }
        $minutos = floor($segundos / 60);
        $segundosRestantes = $segundos % 60;
        if($segundosRestantes){
            return "$minutos minutos y $segundosRestantes segundos";

        }else{
            return "$minutos minutos";
        }
    }


}
