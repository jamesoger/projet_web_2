<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modèle Spectacle
 */
class Spectacle extends Model
{
    use HasFactory;

    /**
     * Relations spectacle et programmation
     *
     * @return Relations
     */
    public function programmations()
    {
        return $this->belongsToMany(Programmation::class, 'spectacle_programmation');
    }
}
