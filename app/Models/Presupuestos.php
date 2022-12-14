<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuestos extends Model
{
    use HasFactory;
    protected $table = 'Presupuestos';

    protected $fillable =
    [
        'totales',
        'honorarios',
        'ivaHonorarios',
        'totalHonorarios',
        'subtotalServicios',
        'vigencia',
        'folio',
        'lActivo',
        'idClient',


    ];
}
