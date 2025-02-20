<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;
use App\Models\Role;

class ActionController extends Controller
{
    public function index()
    {
        $actions = Action::with('role')->get();
        return view('actions.index', compact('actions'));
    }

    public function addAction(Request $request)
    {
        if ($request->isMethod('get')) {
            $roles = Role::all();
            return view('actions.addAction', compact('roles'));
        }
    
        $request->validate([
            'action_name' => 'required|max:50',
            'action_status' => 'required|max:10',
            'role_role_id' => 'required|exists:roles,role_id'
        ]);
    
        // Generate action_id dengan format ACT001
        $latestAction = Action::latest('action_id')->first();
        $nextId = $latestAction ? intval(substr($latestAction->action_id, 3)) + 1 : 1;
        $actionId = 'ACT' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
    
        Action::create([
            'action_id' => $actionId, // Pakai ID yang sudah digenerate
            'action_name' => $request->action_name,
            'action_status' => $request->action_status,
            'role_role_id' => $request->role_role_id
        ]);
        return redirect()->route('actions.index')->with('success', 'Action added successfully!');
    }
    

    public function viewAction(Request $request)
    {
        $action_id = $request->query('action_id');
        $action = Action::where('action_id', $action_id)->firstOrFail();
        return view('actions.viewAction', compact('action'));
    }

    public function editAction(Request $request)
    {
        $action_id = $request->query('action_id');
        $action = Action::where('action_id', $action_id)->firstOrFail();
        $roles = Role::all();
    
        if ($request->isMethod('get')) {
            return view('actions.editAction', compact('action', 'roles'));
        }
    
        $request->validate([
            'action_name' => 'required|max:50',
            'action_status' => 'required|max:10',
            'role_role_id' => 'required|exists:roles,role_id'
        ]);
    
        $action->update($request->all());
        return redirect()->route('actions.index')->with('success', 'Action updated successfully!');
    }
    

    public function deleteAction(Request $request)
    {
        $action_id = $request->query('action_id');
        $action = Action::where('action_id', $action_id)->firstOrFail();
        $action->delete();
        return redirect()->route('actions.index')->with('success', 'Action deleted successfully!');
    }
}