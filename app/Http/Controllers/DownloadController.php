<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    /**
     * Télécharger le CV.
     */
    public function download()
    {
        $path = public_path('cv/cv_danne_romain.pdf');

        return response()->download($path);
    }
}
