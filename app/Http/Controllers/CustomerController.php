<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Customer::all();
        return view('customers', compact('clientes'));
    }

    public function createOrUpdate(Request $request)

    {
        $id = $request->input('id');
        // dd($request); // MAPEO
        $customer = Customer::updateOrCreate(
            ['id' => $id],
            [
                'name' => $request->input('nombre'),
                'email' => $request->input('correo'),
                'rfc' => $request->input('rfc'),
                'cp' => $request->input('codigoPostal'),
                'is_active' => $request->input('status') ? 1 : 0
            ]
        );

        if ($customer) {
            $lastId = $customer->id;
            return response()->json(['error' => false, 'id_last' => $lastId]);
        }

    }

    public function edit(string $id)
    {
        //
    }

}
