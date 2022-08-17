<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PersonasAutorizadas extends Authenticatable
{
    use HasFactory;
    protected $guard = 'autorizados';
    protected $table = 'personas_autorizadas';
}
