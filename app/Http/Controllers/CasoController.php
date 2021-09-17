<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Caso;

class CasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Caso::all();
    }



    public function listCustomer()
    {
        // return Customer::select(['id', 'nombre'])->get();
        $id_cliente= Caso::all()->pluck('customer_id');
        // $nombres = Customer::whereIn('id',$id_cliente )
        //             ->select(['id', 'nombre'])
        //             ->get();

        $nombres = Caso::join('customers','casos.id','=','customers.id')
        ->whereIn('casos.customer_id',$id_cliente)
        ->select('customers.id','customers.nombre','casos.state')
        ->get();

        return $nombres;
    }

    public function store(Request $request)
    {

        $caso = new Caso();
        $caso->customer_id = $request->customer_id;
        $caso->state = $request->state;
        $caso->date_start = $request->date_start;
        $caso->date_process = $request->date_process;
        $caso->date_end = $request->date_end;
        $caso->save();

        return true;

    }


    public function update(Request $request, $id)
    {
        $caso = Caso::findOrFail($request->id);
        $caso->customer_id = $request->customer_id;
        $caso->state = $request->state;
        $caso->date_start = $request->date_start;
        $caso->date_process = $request->date_process;
        $caso->date_end = $request->date_end;
        $caso->save();

        return true;
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
