<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosTipo extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'tbServiciosTipo';

    protected $fillable =
    [
        'cNombre',
        'lActivo',
    ];
}
