<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()
            ->json(['error' => Null, 'cart' => Cart::with('products')->get()]);
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
        //

        $inCart = Cart::where('product_id', $request->id)->first();

        if ($inCart){

            $inCart->quantity += 1;

            $inCart->save();

            return response()
                ->json(['error' => Null]);
     }

        $cart = new Cart;

        $cart->product_id = $request->id;

        $cart->quantity = 1;

        $cart->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $cart = Cart::find($id);

        if(!$cart){
            return response()
                ->json(["error" => "Cet identifiant est inconnu"], 404);
        }

        $cart->delete();

        return response()
            ->json(["error" => Null ]);

    }

    public function delete(){

        Cart::truncate();

        return response()
            ->json(["error" => null], 200);
    }
}
