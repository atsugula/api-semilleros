<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use ZipArchive;

class ZipController extends Controller
{
    public function metodologoVisitsZips()
    {
       // return response()->json(['hola']);
        $zip = new ZipArchive;
        $fileName = 'metodologoVisits.zip';

        if ($zip->open(public_path($fileName),ZipArchive::CREATE) === true) 
        {
            $files = File::files(public_path('Template\metodologo'));

            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value,$relativeNameInZipFile);
            }
            $zip->close();
        }

        return response()->download(public_path($fileName));
    }

    public function coordinadorVisitsZips()
    {
       return response()->json(['hola']);
        // $zip = new ZipArchive;
        // $fileName = 'metodologoVisits.zip';

        // if ($zip->open(public_path($fileName),ZipArchive::CREATE) === true) 
        // {
        //     $files = File::files(public_path('Template\coordinador'));

        //     foreach ($files as $key => $value) {
        //         $relativeNameInZipFile = basename($value);
        //         $zip->addFile($value,$relativeNameInZipFile);
        //     }
        //     $zip->close();
        // }

        // return response()->download(public_path($fileName));
    }
}
