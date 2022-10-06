<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'tbClienteF';

    protected $fillable = 
    [
        'cNombre',
        'cApellidoMat',
        'cApellidoPat',
        'cEmail',
        'iTel',
        'iCel',
        'cCURP',
        'cRFC',
        'cOcupacion',
        'cPaisNacimiento',
        'cEstadoCivil',
        'cNombreConyugue',
        'iCalle1',
        'iNumExt1',
        'iNumInt1',
        'cCodPost1',
        'cColonia1',
        'cCiudad1',
        'cEstado1',
        'iCalle2',
        'iNumExt2',
        'iNumInt2',
        'cCodPost2',
        'cColonia2',
        'cCiudad2',
        'cEstado2',
        'cIdentificacionRuta',
        'cActaRuta',
        'cComprobanteRuta',
        'cFechaVencimientoRuta',
        'iTipo',
        'lActivo'
    ];
}
