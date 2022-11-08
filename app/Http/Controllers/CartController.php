<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('home.cart', compact('carts'));
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
        /*  dd($request->product_id,auth()->user()->id); */
        $cart = Cart::where('product_id', $request->product_id)->where('user_id', auth()->user()->id)->first();


        if ($cart) { //ya esta agregado en el carrito
            if ($request->amount && $request->amount > 0) {
                $cart->amount += $request->amount;
            } else {
                $cart->amount += 1;
            }
        } else { // no esta en en carrito
            $cart = new Cart();
            if ($request->amount && $request->amount > 0) {
                $cart->amount = $request->amount;
            } else {
                $cart->amount = 1;
            }
        }

        $cart->product_id = $request->product_id;
        $cart->user_id = auth()->user()->id;
        $cart->save();

        /* dd($cart); */
        $request->session()->flash('message', "Producto agregado al carrito");


        return back();
        /*  $request->Cart()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);
           
        return redirect()->route('posts.index', auth()->user()->username); */
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
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back();
    }
}
