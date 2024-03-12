<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\DetailSelection;
use App\Models\Selection;

class DetailSelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $detalleSeleccion = new DetailSelection;
        $detalleSeleccion->serial = $request->serial;
        $detalleSeleccion->batch = $request->batch;
        $detalleSeleccion->shift = $request->shift;
        $detalleSeleccion->ok = $request->piezasOk;
        $detalleSeleccion->n_ok = $request->piezasNok;
        $detalleSeleccion->total = $request->piezasOk + $request->piezasNok;
        $detalleSeleccion->selection_id = $request->id;
        $detalleSeleccion->observation = '';
        $detalleSeleccion->save();

        $seleccion =  Selection::find($request->id);
        $seleccion->total_ok = $seleccion->total_ok + intval($request->piezasOk);
        $seleccion->total_nok = $seleccion->total_nok + intval($request->piezasNok);
        $seleccion->save();

        $totales = array("totalOk" =>$seleccion->total_ok, "totalNok" =>$seleccion->total_nok);
        return response()->json($totales);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detalles = DetailSelection::select('detail_selections.shift', 'detail_selections.created_at as date', 'detail_selections.ok', 'detail_selections.n_ok', 'detail_selections.total', 'detail_selections.batch', 'detail_selections.serial', DB::raw('GROUP_CONCAT(CONCAT(works.description," : ",logs.quantity_nok, "  ")) as logs'))
        ->join('logs', 'logs.id_details_select', '=', 'detail_selections.id')
        ->join('works', 'works.id', '=', 'logs.id_quality_concerns')
        ->where('selection_id', $id)
        ->groupBy('detail_selections.id', 'detail_selections.shift', 'detail_selections.created_at', 'detail_selections.ok', 'detail_selections.n_ok', 'detail_selections.total', 'detail_selections.batch', 'detail_selections.serial')
        ->get();
        // var_dump($detalles);

        return response()->json(["detalles" => $detalles]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
