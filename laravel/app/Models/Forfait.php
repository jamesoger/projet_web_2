<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forfait extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(Forfait::class, 'user_forfait');
    }
}
