<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modèle Artiste
 */
class Artiste extends Model
{
    use HasFactory;

    /**
     * Relation artistes et programmations
     *
     * @return Relations
     */
    public function programmations()
    {
        return $this->belongsToMany(Programmation::class, 'artiste_programmation');
    }

    /**
     * attribut pour tri par heure dans la vue programmation
     */
    public function getHeureAttribute()
    {
        return $this->heure_show;
    }

    /**
     * Attribut pour nom dans la vue programmation
     */
    public function getNomAttribute()
    {
        return $this->nom_scene;
    }
}
