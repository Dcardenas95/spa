<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lawyer;

class LawyerController extends Controller
{

    public function index()
    {
         // if (!$request->ajax()) return redirect('/');
        $customers = Lawyer::all();
        return $customers;
    }

    public function store(Request $request)
    {
        $lawyer = new Lawyer();
        $lawyer->cedula = $request->cedula;
        $lawyer->nombre = $request->nombre;
        $lawyer->direccion = $request->direccion;
        $lawyer->telefono = $request->telefono;
        $lawyer->save();
    }

    public function update(Request $request, $id)
    {
        $lawyer = Lawyer::findOrFail($request->id);
        $lawyer->cedula = $request->cedula;
        $lawyer->nombre = $request->nombre;
        $lawyer->direccion = $request->direccion;
        $lawyer->telefono = $request->telefono;
        $lawyer->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
