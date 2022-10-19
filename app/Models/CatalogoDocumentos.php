<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoDocumentos extends Model
{
    use HasFactory;
    // protected $guard = 'autorizados';
    protected $table = 'tbCatalogoDocumentos';

    protected $fillable = 
    [
        'cNombre',
        'cRuta',
        'cDescripcion',
        'iIDCategoria',
        'lActivo',
        'cPlantilla'
    ];
}
