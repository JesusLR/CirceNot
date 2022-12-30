<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PersonasAutorizadas extends Authenticatable
{
    use HasFactory, HasRoles;
    protected $guard = 'auto';
    protected $table = 'personas_autorizadas';
    protected $primaryKey = 'iIDPersonaAutorizada';

    protected $fillable =
    [
        'cNombre',
        'cPrimerApellido',
        'cSegundoApellido',
        'email',
        'emailDos',
        'cUsuario',
        'password',
        'cCURP',
        'cRFC',
        'iIDPermiso',
        'iIDPuesto',
        'iTelefono',
        'created_at',
        'updated_at',
        'lActivo'
];
}
