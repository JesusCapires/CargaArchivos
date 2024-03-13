<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    private $disk = "public";

    public function loadView($id)
    {
        $files = [];
        $folder = "seleccion_$id";
        foreach (Storage::disk($this->disk)->files($folder) as $file) {
            $name = basename($file);
            $picture = "";
            $sizeKB = number_format(Storage::disk($this->disk)->size($folder. '/' . $name) / 1024, 2) . ' KB';
            $downloadLink = route("download", $name);

                $files[] = [
                    "picture" => $picture,
                    "name" => $name,
                    "link" => $downloadLink,
                    "size" => $sizeKB,
                ];
        }

        return response()->json(['documentos' => $files]);

    }

    public function storeFile(Request $req)
    {
        if($req->isMethod('POST')){
            $id = $req->input('id');
            $folder = "seleccion_$id";
            $disk = $this->disk;
            if(!Storage::disk($disk)->exists($folder)){
                Storage::disk($disk)->makeDirectory($folder);
            }
            $file = $req->file('file');
            $name = $req->input('name');
            $file->storeAs($folder, $name.".".$file->extension(), $this->disk);
        }
    }

    public function seeFile($name, $id)
    {
        $folder = "seleccion_$id";
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

    public function downloadFile($name, $id)
    {
        $folder = "seleccion_$id";
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
