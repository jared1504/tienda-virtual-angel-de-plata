<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $attempts = session()->get('login.attempts', 0); // obtener intentos, default: 0

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            if ($attempts < 2) {
                session()->put('login.attempts', $attempts + 1); // incrementrar intentos
                return back()->with('mensaje', 'Credenciales Incorrectas');
            } else {
                session()->put('login.attempts', 0); // reiniciar intentos
                return view('auth.error');
            }
        }
        session()->put('login.attempts', 0); // reiniciar intentos
        $user = User::where('email', $request->email)->first();


        if ($user->type == 1) { //1-> cliente
            return redirect()->route('home.index');
        } else {  //2-> admin

            return redirect()->route('sale.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
    public function destroy()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
