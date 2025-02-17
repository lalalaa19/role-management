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

    public function create()
    {
        $roles = Role::all();
        return view('actions.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'action_name' => 'required|max:50',
            'action_status' => 'required|max:10',
            'role_role_id' => 'required|exists:roles,role_id'
        ]);

        Action::create($request->all());
        return redirect()->route('actions.index')->with('success', 'Action added successfully!');
    }

    public function show(Action $action)
    {
        return view('actions.show', compact('action'));
    }

    public function edit($id)
    {
        $action = Action::findOrFail($id);
        $roles = Role::all();
        return view('actions.edit', compact('action', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'action_name' => 'required|max:50',
            'action_status' => 'required|max:10',
            'role_role_id' => 'required|exists:roles,role_id'
        ]);

        $action = Action::findOrFail($id);
        $action->update($request->all());
        return redirect()->route('actions.index')->with('success', 'Action updated successfully!');
    }

    public function destroy($id)
    {
        $action = Action::findOrFail($id);
        $action->delete();
        return redirect()->route('actions.index')->with('success', 'Action deleted successfully!');
    }
}