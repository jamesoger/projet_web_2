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
    public function programmations(){
        return $this->belongsToMany(Programmation::class, 'artiste_programmation');

    }


}
