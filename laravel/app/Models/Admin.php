<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory;

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function getNomCompletAttribute(){
        return $this->prenom . " " . $this->nom;
    }

}
