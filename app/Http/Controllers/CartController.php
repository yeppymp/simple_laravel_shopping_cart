<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use App\CartProduct;
use Illuminate\Http\Request;
use PDF;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::where('id_user', 1)->first();
        return view('cart', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::where('id_user', 1)->first();
        $cart_product = new CartProduct;
        $cart_product->id_product = $request->id_product;
        $cart_product->qty = $request->qty;
        $cart_product->id_cart = $cart->id;
        $cart_product->save();

        $cart_products = CartProduct::where('id_cart', $cart->id)->get();
        $total = 0;

        foreach($cart_products as $c) {
            $total += $c->product->price;
        }

        $cart->total = $total;
        $cart->save();

        return redirect()->route('carts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::where('id_user', 1)->first();
        CartProduct::where('id_cart', $cart->id)->where('id_product', $id)->delete();

        $cart_products = CartProduct::where('id_cart', $cart->id)->get();
        $total = 0;

        foreach($cart_products as $c) {
            $total += $c->product->price;
        }

        $cart->total = $total;
        $cart->save();
        return redirect()->back();
    }

    public function invoice($id_cart)
    {
        $cart = Cart::where('id_user', 1)->first();
        $cart_products = CartProduct::where('id_cart', $cart->id)->get();
        $user = User::find(1);
 
        $pdf = PDF::loadview('invoice', compact('user', 'cart', 'cart_products'))->setPaper('a4', 'landscape');
        return $pdf->stream('invoice-'.$cart->id.'-'.$user->name.'-pdf');
    }
}
