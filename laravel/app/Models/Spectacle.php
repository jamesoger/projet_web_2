<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spectacle extends Model
{
    use HasFactory;

    public function programmations(){
        return $this->belongsToMany(Programmation::class, 'spectacle_programmation');
    }
}
