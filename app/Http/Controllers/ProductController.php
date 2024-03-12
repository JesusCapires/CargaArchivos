<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::all();
        return view('products', compact('productos'));
    }

    public function createOrUpdate(Request $request)
    {
        $id = $request->input('id');
        $product = Product::updateOrCreate(
            ['id' => $id],
            [
                'sku' => $request->input('producto'),
                'description' => $request->input('descripcion'),
                'is_active' => $request->input('status') ? 1 : 0
            ]
        );

        if ($product) {
            $lastId = $product->id;
            return response()->json(['error' => false, 'id_last' => $lastId]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

}
