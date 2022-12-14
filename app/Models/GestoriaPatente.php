<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestoriaPatente extends Model
{
    use HasFactory;
    protected $table = 'tbGestoriaPatente';

    protected $fillable =
    [
        'cNombreTitular',
        'cApellidoPatTitular',
        'cApellidoMatTitular',
        'cDireccion',
        'cCorreo',
        'iTelefono',
        'iCelular',
        'cProfesionTitular',
        'cRFC',
        'cCURP',
        'cFechaNombramiento',
        'cRutaNombramiento',
        'cNombramiento',
        'lActivo',
    ];

}
