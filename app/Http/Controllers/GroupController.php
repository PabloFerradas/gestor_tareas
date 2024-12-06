<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function store(Request $request)
    {
        $group = Group::create([
            'name' => $request->name,
        ]);

        // Asignar al grupo el usuario actual (por ejemplo, el admin)
        $group->users()->attach(auth()->id(), ['role' => 'admin']);

        return redirect()->route('groups.index');
    }

    public function addUserToGroup(Request $request, $groupId)
    {
        $group = Group::findOrFail($groupId);

        // Agregar un usuario al grupo con un rol
        $group->users()->attach($request->user_id, ['role' => $request->role]);

        return redirect()->route('groups.show', $groupId);
    }
}
