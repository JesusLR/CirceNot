<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresupuestoService extends Model
{
    use HasFactory;
    protected $table = 'Presupuesto_has_service';

    protected $fillable =
    [
        'id_presupuesto',
        'id_service',
        'cantidad',



    ];
}
