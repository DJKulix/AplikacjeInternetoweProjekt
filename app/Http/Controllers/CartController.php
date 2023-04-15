<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();

        $cart = $cartItems->sortBy('id');
        return view('layouts.cart', compact('cart'));
    }


    public function addToCart(Request $request)
    {

//        if()
        \Cart::add(['id' => $request->id, 'name' => $request->name, 'price' => $request->price, 'quantity' => $request->quantity,]);
//        session()->flash('success', 'Dodano do koszyka!');

        return Redirect::back()->with('message', 'Added to cart!');
    }

    public function updateCart(Request $request)
    {
        \Cart::update($request->id, ['quantity' => ['relative' => false, 'value' => $request->quantity],]);
//            print_r("APDEJT");
//        session()->flash('success', 'Item Cart is Updated Successfully !');

        return Redirect::back();
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return Redirect::back();
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
