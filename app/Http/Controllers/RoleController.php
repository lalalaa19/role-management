<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'role_name' => 'required|string|max:255',
        ]);
    
        $role = Role::create([
            'role_id' => 'RL' . rand(100, 999), // Generate role_id otomatis
            'role_name' => $validated['role_name'],
        ]);
    
        return redirect()->route('roles.index')->with('success', 'Role added successfully!');
    }    

    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    public function edit($role_id)
    {
        $role = Role::where('role_id', $role_id)->firstOrFail();
        return view('roles.edit', compact('role'));
    }    

    public function update(Request $request, $role_id)
    {
        $validated = $request->validate([
            'role_name' => 'required|string|max:255',
        ]);
    
        $role = Role::where('role_id', $role_id)->firstOrFail();
        $role->update(['role_name' => $validated['role_name']]);
    
        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }    

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role berhasil dihapus.');
    }
}