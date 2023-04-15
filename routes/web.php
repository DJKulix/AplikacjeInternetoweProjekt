<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EquipmentTypeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('index');
});

Route::get('index', function(){
    return view('index');
});

Route::get('equipmentList', function(){
    return view('equipment.equipmentList');
});

Route::get('equipmentView', function(){
    return view('equipment.equipmentView');
});

//Route::get('user', function (){
//    $cartItems = \Cart::getContent();
//    return view('user.settings', ["cartItems"=>$cartItems]);
//});

Route::get('rent', function (){
    $cartItems = \Cart::getContent();
    $user = \Illuminate\Support\Facades\Auth::user();
    return view('user.rent', compact('cartItems'));
});

Route::get('mixers', function (){
    $equipments=Equipment::where('type', 1)->get();
    return view('equipment.list', ["equipments"=>$equipments]);
});

Route::get('columns', function (){
    $equipments=Equipment::where('type',2)->get();
    return view('equipment.list', ["equipments"=>$equipments]);
});

Route::get('microphones', function (){
    $equipments=Equipment::where('type', 3)->get();
    return view('equipment.list', ["equipments"=>$equipments]);
});

Route::get('audio', function (){
    $equipments=Equipment::where('type', 4)->get();
    return view('equipment.list', ["equipments"=>$equipments]);
});

Route::get('controllers', function (){
    $equipments=Equipment::where('type', 5)->get();
    return view('equipment.list', ["equipments"=>$equipments]);
});

Route::get('fixtures', function (){
    $equipments=Equipment::where('type', 6)->get();
    return view('equipment.list', ["equipments"=>$equipments]);
});


Route::get('dmx', function (){
    $equipments=Equipment::where('type', 7)->get();
    return view('equipment.list', ["equipments"=>$equipments]);
});


Route::get('userList', function (){
    if (! Gate::allows('is-admin')) {
        abort(403);
    }
    $users = User::all();
    return view('user.list', ["users"=>$users]);

});


Route::resource('equipment', EquipmentController::class);

Route::resource('event', EventController::class);

//Route::resource('extra', ExtraController::class);

Route::resource('role', RoleController::class);

Route::resource('type', EquipmentTypeController::class);

Route::resource('user', UserController::class)->middleware('auth');



//Koszyk
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');


//Logowanie
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'authenticate')->name('login.authenticate');
    Route::get('/logout', 'logout')->name('logout');
});




