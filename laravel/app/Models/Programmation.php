<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modèle Programmation
 */
class Programmation extends Model
{
    use HasFactory;

     /**
      * Relation programmation et artistes
      *
      * @return Relations
      */
    public function artistes(){
        return $this->belongsToMany(Artiste::class, 'artiste_programmation');

    }

    /**
     * Relation programmation et spectacles
     *
     * @return Relations
     */
    public function spectacles(){
        return $this->belongsToMany(Spectacle::class, 'spectacle_programmation');
    }


}
