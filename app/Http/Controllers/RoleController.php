<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Models\Role;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index(){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        $roles = Role::all();
        return view('role.list', ["roles"=>$roles]);
    }

    public function show(){
        return true;
    }

    public function edit(Role $role){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        return view('role.edit', ['role'=>$role]);
    }

    public function update(Request $request, $roleID){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        $validatedData = $request->validate([
            'name' => 'bail|required|max:50',
        ]);

        $role = Role::where('id', '=', $roleID);
        $role->update(['role'=>$request['role']]);
        return redirect(route('role.index'));
    }

    public function create(){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        return view('role.create');
    }

    public function store(StoreRoleRequest $request){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        $validatedData = $request->validate([
            'name' => 'bail|required|max:50',
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->save();
        return redirect(route('role.index'));
    }

    public function destroy(Role $role){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        try {
            $role->delete();
        }
        catch (QueryException){
            print_r('<script>alert("Cannot delete. Role is used in Users table.")</script>');
        }
        return redirect(route('role.index'));
    }
}
