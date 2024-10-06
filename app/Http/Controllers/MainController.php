<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function home() 
    {
        return view('main.home');
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
