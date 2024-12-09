<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Restituisce tutti i ruoli
    public function index()
    {
        return response()->json(Role::all());
    }

    // Crea un nuovo ruolo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:roles',
            'price_with_license' => 'required|numeric|min:0',
            'price_without_license' => 'required|numeric|min:0',
        ]);

        $role = Role::create($validated);

        return response()->json($role, 201);
    }

    // Mostra i dettagli di un ruolo
    public function show($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role);
    }

    // Aggiorna un ruolo
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:50|unique:roles,name,' . $id,
            'price_with_license' => 'sometimes|required|numeric|min:0',
            'price_without_license' => 'sometimes|required|numeric|min:0',
        ]);

        $role->update($validated);

        return response()->json($role);
    }

    // Elimina un ruolo
    public function destroy($id)
    {
        Role::destroy($id);
        return response()->json(['message' => 'Role deleted successfully']);
    }
}
