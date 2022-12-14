<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gestoria extends Model
{
    use HasFactory;
    protected $table = 'tbGestoria';
    protected $primaryKey = "iIDGestoria";

    protected $fillable =
    [
        'iIDGestoriaPatente',
        'cNombreGestoria',
        'iNumGestoria',
        'cDomicilioGestoria',
        'cEmailGestoria',
        'iTelGestoria',
        'cLogoGestoria',
        'cRutaLogoGestoria',
        'lActivo',
        'lPA',
        'lPC',
        'lPE',
        'cPA_Libro',
        'cPA_Acta',
        'iPA_FojaInic',
        'iPA_FojaFin',
    ];
}
