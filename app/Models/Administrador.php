<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrador extends Authenticatable
{
    use HasFactory, HasRoles;
    protected $guard = 'admin';
    protected $table = 'administradors';
    protected $fillable = [
        'cNombre', 'cPrimerApellido', 'cSegundoApellido', 'email', 'password'
    ];
}
