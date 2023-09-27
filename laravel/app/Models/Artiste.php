<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{
    use HasFactory;

    public function programmations(){
        return $this->belongsToMany(Programmation::class, 'artiste_programmation');
    }

    public function getHeureAttribute() {
        return $this->heure_show;
    }

    public function getNomAttribute() {
        return $this->nom_scene;
    }
}
