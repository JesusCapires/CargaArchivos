<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



use App\Models\Product;
use App\Models\QualityConcern;
use App\Models\Selection;
use App\Models\User;
use App\Models\UserSelection;
use App\Models\Work;



class SelectionController extends Controller
{
    private $disk = "public";


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = [];
        $folder = "documentos";
        foreach (Storage::disk($this->disk)->files($folder) as $file) {
            // $name = str_replace("$this->disk/", "", $file);
            $name = basename($file);

            $picture = "";
            $sizeKB = number_format(Storage::disk($this->disk)->size($folder. '/' . $name) / 1024, 2) . ' KB';
            $downloadLink = route("download", $name);

                $files[] = [
                    "picture" => $picture,
                    "name" => $name,
                    "link" => $downloadLink,
                    "size" => $sizeKB
                ];
        }

        $listaCriterios = Work::select('id', 'description')->where('is_active', 1)->get();
        $listaResponsables = User::select('id', 'name')->where('is_active', 1)->where('role_id', 8)->get();
        $listaProductos = Product::select('id', 'sku','description')->where('is_active', 1)->get();
        return view('selections', compact('listaCriterios', 'listaResponsables', 'listaProductos', 'files'));
    }


    public function getSelections(string $id)
    {
        $listaSelecciones = Selection::select('selections.id as idSeleccion', 'customers.name as nombreCliente', 'products.sku as numeroParte', 'selections.hours as horas', 'selections.rate', 'selections.price as precio', 'selections.cost as costo', 'selections.total_ok as ok', 'selections.total_nok as nok', 'selections.quantity as cantidad', 'users.name as nombreUsuario', 'selections.created_at as creacion', DB::raw("GROUP_CONCAT(CONCAT(works.description)) as criterios"))
            ->join('customers', 'customers.id', '=', 'selections.customer_id')
            ->join('products', 'products.id', '=', 'selections.product_id')
            ->join('users', 'users.id', '=', 'selections.user_id')
            ->join('quality_concerns', 'quality_concerns.selection_id', '=', 'selections.id')
            ->join('works', 'works.id', '=', 'quality_concerns.work_id')
            ->where('selections.status', $id)
            ->groupBy('selections.id' ,'customers.name','products.sku' ,'selections.hours' ,'selections.rate' ,'selections.price' ,'selections.cost' ,'selections.total_ok' ,'selections.total_nok' ,'selections.quantity' ,'users.name' ,'users.id' ,'selections.created_at')
            ->get();
        return response()->json(['selecciones' => $listaSelecciones]);

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
        $seleccion = new Selection;
        $seleccion->quantity = $request->cantidad;
        $seleccion->observation = $request->observaciones;
        $seleccion->product_id = $request->producto;
        $seleccion->customer_id = 1;
        $seleccion->user_id = $request->responsable;

        $seleccion->save();

        $usuarioSeleccion = new UserSelection;
        $usuarioSeleccion->selection_id = $seleccion->id;
        $usuarioSeleccion->user_id = $request->responsable;
        $usuarioSeleccion->save();


        foreach ($request->criterios as $key => $idCriterio) {
            $criterio = new  QualityConcern;
            $criterio->work_id = $idCriterio;
            $criterio->selection_id = $seleccion->id;
            $criterio->save();
        }

        return $seleccion->id;


        // dd($request->responsable);
        // // oreach ($datos as $key => $val) {
        // // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $seleccion = Selection::select('quantity as cantidad', 'rate', 'price')->where('id', $id)->get();

        return response()->json(["seleccion" => $seleccion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seleccion = Selection::find($id);
        $seleccion->quantity = $request->input('cantidad');
        $seleccion->rate = $request->input('rate');
        $seleccion->hours = $request->input('cantidad') / $request->input('rate');
        $seleccion->price = $request->input('precio');
        $seleccion->cost =  ($request->input('cantidad') / $request->input('rate')) * $request->input('precio');
        $seleccion->save();
        return true;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
