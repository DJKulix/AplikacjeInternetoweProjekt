<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Models\EquipmentType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EquipmentTypeController extends Controller
{
    public function index(){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }

        $types = EquipmentType::all();
        return view('type.list', ["types"=>$types]);
    }

    public function show(){
        return true;
    }

    public function edit(EquipmentType $type){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        return view('type.edit', ['type'=>$type]);
    }

    public function update(Request $request, $typeID){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        $validatedData = $request->validate([
            'type' => 'bail|required|max:40',
        ]);

        $type = EquipmentType::where('id', '=', $typeID);
        $type->update(['type'=>$request['type']]);
        return redirect(route('type.index'));
    }

    public function create(){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        return view('type.create');
    }

    public function store(StoreRoleRequest $request){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        $validatedData = $request->validate([
            'type' => 'bail|required|max:40',
        ]);

        $type = new EquipmentType;
        $type->type = $request->type;
        $type->save();
        return redirect(route('type.index'));
    }

    public function destroy(EquipmentType $type){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        try {
            $type->delete();
            return redirect(route('type.index'));
        }
        catch (QueryException) {
           print_r ('<script>alert("Cannot delete. Type is used in Equipments table.")</script>');
        }

        return true;
    }
}
