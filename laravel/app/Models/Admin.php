<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Modèle Admin
 */
class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;

    /**
     * Role admin ou employé
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Accesseur pour le nom complet de l'admin
     *
     * @return Attribute
     */
    public function getNomCompletAttribute(){
        return $this->prenom . " " . $this->nom;
    }

}
