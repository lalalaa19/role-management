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

    public function addRole(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('roles.addRole');
        }
    
        $validated = $request->validate([
            'role_name' => 'required|string|max:255',
        ]);
    
        Role::create([
            'role_id' => 'RL' . rand(100, 999),
            'role_name' => $validated['role_name'],
        ]);
    
        return redirect()->route('roles.index')->with('success', 'Role added successfully!');
    }      

    public function viewRole(Request $request)
    {
        $role_id = $request->query('role_id');

        $role = Role::where('role_id', $role_id)->firstOrFail();
        return view('roles.viewRole', compact('role'));
    }

    public function editRole(Request $request)
    {
        $role_id = $request->query('role_id');
        $role = Role::where('role_id', $role_id)->firstOrFail();
        
        if ($request->isMethod('get')) {
            return view('roles.editRole', compact('role'));
        }
    
        $validated = $request->validate([
            'role_name' => 'required|string|max:255',
        ]);
    
        $role->update(['role_name' => $validated['role_name']]);
    
        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }
    

    public function deleteRole(Request $request)
    {
        $role_id = $request->query('role_id');
        $role = Role::where('role_id', $role_id)->firstOrFail();
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully.');
    }
}