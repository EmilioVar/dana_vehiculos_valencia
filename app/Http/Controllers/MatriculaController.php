<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function create() {
        return view('matriculas.create');
    }
}
