<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $cartItems = \Cart::getContent();
        $cart = $cartItems->sortBy('id');
        return view('user.settings', ["cartItems"=>$cart]);
    }

    public function show(User $user){
        $cartItems = \Cart::getContent();
        $cart = $cartItems->sortBy('id');
        return view('user.rent', compact('cart'));
    }

    public function edit(User $user){
//        $user = User::where(Auth::id(), '=', $user->id);
        return view('user.edit', ["user"=>$user]);
    }

    public function create(){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }

        return view('user.create');
    }

    public function store(Request $request){
        if (!Gate::allows('is-admin')) {
            abort(403);
        }
        $validatedData = $request->validate([
            'name' => 'bail|required|max:50',
            'surname' => 'bail|required|max:50',
            'email' => 'bail|required|unique:users',
            'password' => 'required',
            'address' => 'bail|required|max:200',
            'company' => 'bail|required|max:200',
            'nip'=>'bail|required|digits:10|numeric',
            'role'=>'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->company = $request->company;
        $user->nip = $request->nip;
        $user->roleID = $request->role;

        $user->save();
        return  redirect('/userList');
    }

    public function update(Request $request, $userID){
        $validatedData = $request->validate([
            'name' => 'bail|required|max:50',
            'surname' => 'bail|required|max:50',
            'email' => 'bail|required',
            'address' => 'bail|required|max:200',
            'company' => 'bail|required|max:200',
            'nip'=>'bail|required|digits:10|numeric'
        ]);

        $user = User::where('id', '=', $userID);
        if($request['password'] != null)
            $user->update(['password'=>Hash::make($request['password'])]);
        $user->update([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
//            'password' => Hash::make($request['password']),
            'address' => $request['address'],
            'company' => $request['company'],
            'nip' => $request['nip'],

        ]);
        if (Gate::allows('is-admin')) {
            $validatedData = $request->validate([
                'role' => 'required'
                ]);
            $user->update([
                'roleID' => $request['role']
            ]);
        }
        if (!Gate::allows('is-admin')) {
            return redirect(route('user.index'));
        }
        return redirect('/userList');
    }
}
