<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modele Actualité
 */
class Actualite extends Model
{
    use HasFactory;
    protected $fillable = ['date','titre', 'image', 'details'];
}
