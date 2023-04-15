<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Models\Equipment;
use App\Models\EquipmentType;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EquipmentController extends Controller
{

    public function index()
    {
        $equipment = Equipment::all();
        return view('equipment.list', ["equipments" => $equipment]);
    }

    public function show(Equipment $equipment)
    {

        if (!$equipment) {
            return response()->json(['message' => 'Taki produkt nie istnieje!', 404]);
        }

        return view('equipment.show', ['equipment' => $equipment]);
    }

    public function edit(Equipment $equipment)
    {
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        return view('equipment.edit', ['equipment' => $equipment]);
    }

    public function update(Request $request, $equipmentID)
    {
        if (! Gate::allows('is-admin', $equipmentID)) {
            abort(403);
        }

        $validatedData = $request->validate([
            'type' => 'bail|required',
            'name' => 'bail|required|max:50',
            'price' => 'bail|required|min:0|not_in:0',
            'quantity' =>'bail|required|min:0',
            'description'=>'bail|required|max:500',
            'info'=>'max:200',
            'info2'=>'max:200',
            'info3'=>'max:200',
            'info4'=>'max:200',
            'info5'=>'max:200',
            'feature1' => 'max:200',
            'feature2'=> 'max:200',
            'feature3'=> 'max:200'

        ]);

        $equipment = Equipment::where('id', '=', $equipmentID);
        $equipment->update(['type' => $request['type'], 'name' => $request['name'], 'price' => $request['price'], 'quantity' => $request['quantity'], 'imagePath' => $request['imagePath'], 'imagePath2' => $request['imagePath2'], 'videoPath' => $request['videoPath'], 'description' => $request['description'], 'info1' => $request['info1'], 'info2' => $request['info2'], 'info3' => $request['info3'], 'info4' => $request['info4'], 'info5' => $request['info5'], 'feature1' => $request['feature1'], 'feature2' => $request['feature2'], 'feature3' => $request['feature3'],]);
        return redirect(route('equipment.index'));
    }

    public function create()
    {
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        return view('equipment.create');
    }

    public function store(StoreRoleRequest $request)
    {
        $validatedData = $request->validate([
            'type' => 'bail|required',
            'name' => 'bail|required|max:50',
            'price' => 'bail|required|min:0|not_in:0',
            'quantity' =>'bail|required|min:0',
            'description'=>'bail|required|max:500',
            'info'=>'max:200',
            'info2'=>'max:200',
            'info3'=>'max:200',
            'info4'=>'max:200',
            'info5'=>'max:200',
            'feature1' => 'max:200',
            'feature2'=> 'max:200',
            'feature3'=> 'max:200'

        ]);

        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        $equipment = new Equipment;
        $equipment->type = $request->type;
        $equipment->name = $request->name;
        $equipment->price = $request->price;
        $equipment->quantity = $request->quantity;
        $equipment->imagePath = $request->imagePath;
        $equipment->imagePath2 = $request->imagePath2;
        $equipment->videoPath = $request->videoPath;
        $equipment->description = $request->description;
        $equipment->info1 = $request->info1;
        $equipment->info2 = $request->info2;
        $equipment->info3 = $request->info3;
        $equipment->info4 = $request->info4;
        $equipment->info5 = $request->info5;
        $equipment->feature1 = $request->feature1;
        $equipment->feature2 = $request->feature2;
        $equipment->feature3 = $request->feature3;

        $equipment->save();
        return redirect('/equipment');
    }

    public function put(Equipment $equipment, Request $request)
    {
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        $request->session()->put('id', $request->id);
    }

    public function destroy(Equipment $equipment)
    {
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        try {
            $equipment->delete();
        }

        catch (QueryException) {
            print_r ('<script>alert("Cannot delete. Equipment has a record in Events table.")</script>');
        }
        return redirect(route('equipment.index'));
    }

}
