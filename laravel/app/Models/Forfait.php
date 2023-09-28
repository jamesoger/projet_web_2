<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modèle Forfait
 */
class Forfait extends Model
{
    use HasFactory;

     /**
      * Relation forfaits et utilisateurs
      *
      * @return Relations
      */
    public function users(){
        return $this->belongsToMany(User::class, 'user_forfait');
    }
}
