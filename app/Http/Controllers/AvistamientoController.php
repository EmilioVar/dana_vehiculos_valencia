<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvistamientoController extends Controller
{
    public function create() {
        return view('avistamientos.create');
    }
}
