<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programmation extends Model
{
    use HasFactory;

    public function artistes(){
        return $this->belongsToMany(Artiste::class, 'artiste_programmation');

    }


    public function spectacles(){
        return $this->belongsToMany(Spectacle::class, 'spectacle_programmation');
    }


}
