<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesM extends Model
{
    use HasFactory;
    protected $table = 'tbClienteM';

    protected $fillable = 
    [
        'cRazonSocial',
        'cEmail',
        'iTel',
        'iCel',
        'cDomicilioFiscal',
        'cEntidad',
        'cCodigoPost',
        'cRFC',
        'cRegimenFisc',
        'iIDClienteF',
        'cActaRuta',
        'cDocumentacionRuta',
        'iTipo',
        'lActivo',
    ];
}
