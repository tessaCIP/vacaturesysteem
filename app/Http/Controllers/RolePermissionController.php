<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Permissie;
use App\Models\User;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    // Overzicht van rollen
    public function index()
    {
        $rollen = Rol::with('permissies')->get();
        return view('role_permission.index', compact('rollen'));
    }

    // Overzicht van permissies
    public function permissions()
    {
        $permissies = Permissie::all();
        return view('role_permission.permissions', compact('permissies'));
    }

    // Koppel permissies aan een rol
    public function assignPermission(Request $request, $rolId)
    {
        $rol = Rol::findOrFail($rolId);
        $rol->permissies()->sync($request->input('permissie_ids', []));
        return redirect()->back()->with('success', 'Permissies bijgewerkt!');
    }

    // Koppel rollen aan een gebruiker
    public function assignRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->rollen()->sync($request->input('rol_ids', []));
        return redirect()->back()->with('success', 'Rollen bijgewerkt!');
    }
}
