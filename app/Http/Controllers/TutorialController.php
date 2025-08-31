<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function index()
    {
        $tutorials = Tutorial::all(); // Puedes usar all() o paginate() si quieres paginación

        return response()->json([
            'status' => 'ok',
            'message' => 'Listado de tutoriales',
            'data' => $tutorials,
        ]);
    }
}

