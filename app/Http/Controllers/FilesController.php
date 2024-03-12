<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    private $disk = "public";

    public function loadView()
    {

    }

    public function storeFile(Request $req){
        // Storage::disk('public')->put("texto.txt", "Hola"); //PERMITE GUARDAR Y ESCRIBIR
        if($req->isMethod('POST')){
            $file = $req->file('file');
            $name = $req->input('name');
            $folder = "documentos";

            $file->storeAs($folder, $name.".".$file->extension(), $this->disk);
        }
        return redirect()->route('listaSelecciones');
    }

    public function seeFile($name)
    {
        $folder = "documentos";
        $filePath = $folder . '/' . $name;
        $file = Storage::disk($this->disk)->get($filePath);
        $extension = pathinfo(basename($filePath), PATHINFO_EXTENSION);
        $mimeType = $this->getMimeType($extension);

        $headers = [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"',
        ];

        if (Storage::disk($this->disk)->exists($filePath)) {
            return Response::make($file, 200, $headers);
        }

        return response('', 404);
    }
    public function downloadFile($name)
    {
        $folder = "documentos";
        $filePath = $folder . '/' . $name;
        $file = Storage::disk($this->disk)->get($filePath);
        $headers = [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . basename($filePath) . '"',
        ];

        return Response::make($file, 200, $headers);

    }

    private function getMimeType($extension)
    {
        $mimeTypes = [
            'txt' => 'text/plain',
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xls' => 'application/vnd.ms-excel',
            'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ];

        return $mimeTypes[$extension] ?? 'application/octet-stream';
    }


}
