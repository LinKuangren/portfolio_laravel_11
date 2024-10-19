<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Certifications;
use App\Models\Experiences;
use App\Models\Productions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function home() 
    {
        $experiences = Experiences::orderBy('created_at', 'desc')->get()->take(3);
        $productions = Productions::orderBy('created_at', 'desc')->get()->take(3);
        $certifications = Certifications::orderBy('created_at', 'desc')->get()->take(2);

        return view('main.home', [
            'experiences' => $experiences,
            'productions' => $productions,
            'certifications' => $certifications,
        ]);
    }

    public function contact() {
        return view('main.contact');
    }

    public function contactPush(ContactRequest $request) 
    {
        Mail::send(new ContactMail($request->validated()));

        return back()->with('success', 'Votre mail a été envoyé avec succès !');
    }

    /**
     * Télécharger le CV.
     */
    public function download()
    {
        $path = public_path('cv/cv_danne_romain.pdf');

        return response()->download($path);
    }
}
