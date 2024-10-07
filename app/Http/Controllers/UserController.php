<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function profil(User $user)
    {
        return view('user.profil', [
            'user' => $user
        ]);
    }
}
