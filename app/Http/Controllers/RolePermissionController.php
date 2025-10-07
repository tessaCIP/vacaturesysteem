<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Permissie;
use App\Models\User;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    private function isBeheerder($user)
    {
        return $user && $user->hasRole('beheerder');
    }
    public function users()
    {
        $users = User::with('rollen')->get();
        return view('role_permission.users', compact('users'));
    }

    public function destroyUser($id)
    {
        $user = request()->user();
        if (!$this->isBeheerder($user)) {
            return redirect()->back()->with('error', 'Alleen beheerders mogen gebruikers verwijderen.');
        }
        if ($user->id == $id) {
            return redirect()->back()->with('error', 'Je kunt jezelf niet verwijderen.');
        }
        $target = User::findOrFail($id);
        $target->delete();
        return redirect()->back()->with('success', 'Gebruiker verwijderd!');
    }
    public function editPermissions($rolId)
    {
        $rol = Rol::with('permissies')->find($rolId);
        if (!$rol) {
            return redirect('/rollen')->with('error', 'Rol niet gevonden.');
        }
        $permissies = Permissie::all();
        return view('role_permission.edit_permissions', compact('rol', 'permissies'));
    }
    public function index()
    {
        $rollen = Rol::with('permissies')->get();
        return view('role_permission.index', compact('rollen'));
    }

    public function destroyRol($id)
    {
        $user = request()->user();
        if (!$this->isBeheerder($user)) {
            return redirect()->back()->with('error', 'Alleen beheerders mogen rollen verwijderen.');
        }
        $rol = Rol::findOrFail($id);
        $rol->delete();
        return redirect()->back()->with('success', 'Rol verwijderd!');
    }

    public function destroyPermissie($id)
    {
        $user = request()->user();
        if (!$this->isBeheerder($user)) {
            return redirect()->back()->with('error', 'Alleen beheerders mogen permissies verwijderen.');
        }
        $permissie = Permissie::findOrFail($id);
        $permissie->delete();
        return redirect()->back()->with('success', 'Permissie verwijderd!');
    }

    public function permissions()
    {
        $permissies = Permissie::all();
        return view('role_permission.permissions', compact('permissies'));
    }

    public function assignPermission(Request $request, $rolId)
    {
        $rol = Rol::findOrFail($rolId);
        $rol->permissies()->sync($request->input('permissie_ids', []));
        return redirect()->back()->with('success', 'Permissies bijgewerkt!');
    }

    public function assignRole(Request $request, $userId)
    {
        $currentUser = $request->user();
        if (!$this->isBeheerder($currentUser)) {
            return redirect()->back()->with('error', 'Alleen beheerders mogen rollen toewijzen.');
        }
        $user = User::findOrFail($userId);
        $user->rollen()->sync($request->input('rol_ids', []));
        return redirect()->back()->with('success', 'Rollen bijgewerkt!');
    }
}
