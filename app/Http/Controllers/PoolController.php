<?php

namespace App\Http\Controllers;

use App\Models\Pool;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    // Restituisce tutte le piscine
    public function index()
    {
        return response()->json(Pool::all());
    }

    // Crea una nuova piscina
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'coordinator' => 'nullable|exists:users,id',
            'foto' => 'nullable|string',
        ]);

        $pool = Pool::create($validated);

        return response()->json($pool, 201);
    }

    // Mostra i dettagli di una piscina
    public function show($id)
    {
        $pool = Pool::findOrFail($id);
        return response()->json($pool);
    }

    // Aggiorna una piscina
    public function update(Request $request, $id)
    {
        $pool = Pool::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'address' => 'sometimes|required|string|max:255',
            'coordinator' => 'nullable|exists:users,id',
            'foto' => 'nullable|string',
        ]);

        $pool->update($validated);

        return response()->json($pool);
    }

    // Elimina una piscina
    public function destroy($id)
    {
        Pool::destroy($id);
        return response()->json(['message' => 'Pool deleted successfully']);
    }
}
