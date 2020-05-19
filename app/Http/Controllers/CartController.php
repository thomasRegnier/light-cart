<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use Validator;

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
            ->json(Cart::with('product')->get());
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
//        try {
//            $request->validate([
//                'product_id' => 'required',
//            ]);
//        } catch (\Exception $e) {
//            return response()->json(['error' => true, 'message' => $e->getMessage()], 422);
//        }


        $validation = Validator::make($request->all(), [
            'product_id' => 'required',
        ]);

        if ($validation->fails()) {
            $message = $validation->messages()->toArray();

            return response()
                ->json(['error' => $message['product_id'][0]], 422 );
        }



        $product = Product::find($request->get('product_id'));
        if (!$product) {
            return response()
                ->json(['error' => true,
                    'message' => 'Unable to find Product with ID '. $request->product_id], 404);
        }

        $inCart = Cart::where('product_id', $request->product_id)->first();

        if ($inCart){

            $inCart->quantity += 1;

            $inCart->save();

            return response()
                ->json($inCart->load('product'));
     }

        $cart = new Cart;

        $cart->product_id = $request->product_id;

        $cart->quantity = 1;

        $cart->save();

        return response()
            ->json($cart->load('product'));
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
    public function destroy($product_id)
    {
        //

     //   $cart = Cart::find($id);

        $cart = Cart::where('product_id', $product_id)->first();


        if(!$cart){
            return response()
                ->json(["error" => true, 'message' => "Unable to find Product with ID"], 404);
        }

        $cart->delete();

        return response()
            ->json([], 200);

    }

    public function delete(){

        Cart::truncate();

        return response()
            ->json([], 200);
    }
}
