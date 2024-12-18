<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccesoController extends Controller
{
    function index()
    {
        return view('acceder');
    }
}
