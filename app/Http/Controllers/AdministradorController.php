<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function adminHome(){
        return view('admin.adminHome');
    }
}
