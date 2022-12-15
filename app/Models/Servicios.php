<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;
    protected $table = 'Servicios';

    protected $fillable =
    [
        'name',
        'Description',
        'Price',
        'user_creator',
        'notaria_id',
        'lActivo',
        'Type',


    ];
}
