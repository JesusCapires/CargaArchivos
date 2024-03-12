<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class QualityController extends Controller
{
    public function index()
    {
        $qualityConcerns = Work::all();
        return view('quality-concern', compact('qualityConcerns'));
    }

    public function createOrUpdate(Request $request)
    {
        $id = $request->input('id');
        $work = Work::updateOrCreate(
            ['id' => $id],
            [
                'description' => $request->input('descripcion'),
                'is_active' => $request->input('status') ? 1 : 0
            ]
        );

        if ($work) {
            $lastId = $work->id;
            return response()->json(['error' => false, 'id_last' => $lastId]);
        }

    }

    public function edit(string $id)
    {
        //
    }

}
