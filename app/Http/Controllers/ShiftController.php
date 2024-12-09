<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    // Restituisce tutti i turni
    public function index()
    {
        return response()->json(Shift::all());
    }

    // Crea un nuovo turno
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pools' => 'required|exists:pools,id',
            'name_role' => 'required|exists:roles,name',
            'id_users' => 'required|exists:users,id',
            'data' => 'required|date',
            'oraInizio' => 'required|date_format:H:i',
            'oraFine' => 'required|date_format:H:i|after:oraInizio',
            'compenso' => 'required|numeric|min:0',
        ]);

        $shift = Shift::create($validated);

        return response()->json($shift, 201);
    }

    // Mostra i dettagli di un turno
    public function show($id)
    {
        $shift = Shift::findOrFail($id);
        return response()->json($shift);
    }

    // Aggiorna un turno
    public function update(Request $request, $id)
    {
        $shift = Shift::findOrFail($id);

        $validated = $request->validate([
            'id_pools' => 'sometimes|required|exists:pools,id',
            'name_role' => 'sometimes|required|exists:roles,name',
            'id_users' => 'sometimes|required|exists:users,id',
            'data' => 'sometimes|required|date',
            'oraInizio' => 'sometimes|required|date_format:H:i',
            'oraFine' => 'sometimes|required|date_format:H:i|after:oraInizio',
            'compenso' => 'sometimes|required|numeric|min:0',
        ]);

        $shift->update($validated);

        return response()->json($shift);
    }

    // Elimina un turno
    public function destroy($id)
    {
        Shift::destroy($id);
        return response()->json(['message' => 'Shift deleted successfully']);
    }
}
