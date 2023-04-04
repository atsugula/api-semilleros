<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class psychological_visits extends Controller
{
    public function index()
    {
        $psychologicalVisits = DB::select('SELECT * FROM get_all_custom_psychological_visits');
        return response()->json($psychologicalVisits, 200);
    }

    public function store(Request $request)
    {
        // Código para guardar una nueva visita psicológica
    }

    public function show($id)
    {
        $psychologicalVisit = DB::select('SELECT * FROM get_psychological_visit_info WHERE id = ?', [$id]);

        if (!$psychologicalVisit) {
            return response()->json(['message' => 'Visita psicológica no encontrada'], 404);
        }

        return response()->json($psychologicalVisit, 200);
    }
}
