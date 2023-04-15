<?php
//
//namespace App\Http\Controllers;
//
//use App\Http\Requests\StoreRoleRequest;
//use App\Models\Event;
//use App\Models\Rent;
//use App\Models\Role;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//
//class RentController extends Controller
//{
//
//
//
//
//    public function edit(Role $role){
//        return view('role.edit', ['role'=>$role]);
//    }
//
//    public function update(Request $request, $roleID){
//        $role = Role::where('id', '=', $roleID);
//        $role->update(['role'=>$request['role']]);
//        return redirect(route('role.index'));
//    }
//
//    public function create(){
//        return view('role.create');
//    }
//
//    public function store(StoreRoleRequest $request){
//        $role = new Role;
//        $role->name = $request->name;
//        $role->save();
//        return redirect(route('role.index'));
//    }
//
//    public function destroy(Role $role){
//        $role->delete();
//        return redirect(route('role.index'));
//    }
//}
