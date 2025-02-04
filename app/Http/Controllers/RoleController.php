<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        // Check if request is AJAX (For Tabulator or API)
        if ($request->ajax()) {
            return response()->json(Role::withTrashed()->get());
        }

        // Otherwise, return the Blade UI
        return view('admin.roles.index');
    }

    public function store(Request $request)
    {
        $role = Role::create($request->all());
        return response()->json($role);
    }

    public function edit($id)
    {
        return response()->json(Role::withTrashed()->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $role = Role::withTrashed()->findOrFail($id);
        $role->update($request->all());
        return response()->json($role);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete(); // Soft delete the role
        return response()->json(['message' => 'Role soft deleted successfully']);
    }

    public function restore($id)
    {
        $role = Role::onlyTrashed()->findOrFail($id);
        $role->restore(); // Restore soft deleted role
        return response()->json(['message' => 'Role restored successfully']);
    }

    public function forceDelete($id)
    {
        $role = Role::onlyTrashed()->findOrFail($id);
        $role->forceDelete(); // Permanently delete the role
        return response()->json(['message' => 'Role permanently deleted']);
    }
}
