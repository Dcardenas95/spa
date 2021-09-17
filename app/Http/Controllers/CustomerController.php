<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (!$request->ajax()) return redirect('/');
        return  Customer::all();
    }

    public function store(Request $request)
    {

        $customers = new Customer();
        $customers->cedula = $request->cedula;
        $customers->nombre = $request->nombre;
        $customers->direccion = $request->direccion;
        $customers->telefono = $request->telefono;
        $customers->estado = $request->estado;
        $customers->save();

        return $customers;
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
    public function update(Request $request)
    {

        $customers = Customer::findOrFail($request->id);
        $customers->cedula = $request->cedula;
        $customers->nombre = $request->nombre;
        $customers->nombre = $request->apellido;
        $customers->direccion = $request->direccion;
        $customers->telefono = $request->telefono;
        $customers->save();

        return $customers;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customer = Customer::findOrfail($request->id);
        $customer->delete();

        return true;
    }
}
