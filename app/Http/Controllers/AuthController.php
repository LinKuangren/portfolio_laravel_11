<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Page login
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Envoie login data
     */
    public function loginPush(LoginRequest $request)
    {
        $user = $request->validated();

        if(Auth::attempt($user)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('success', 'Vous ete connecté !');
        };

        if (!$user) {
            return redirect()->intended(route('home'))->with('success', 'Vous ete déjà connecté.');
        }

        return to_route('auth.login')->withErrors([
            'password' => "Email or Password invalide"
        ])->onlyInput('email');
    }

    /**
     * Page Register
     */
    public function register()
    {
        $auth = new User();

        return view('auth.register', [
            'auth' => $auth,
        ]);
    }

    /**
     * Envoie register data
     */
    public function registerPush(UserRequest $request)
    {
        $auth = User::create($request->validated());

        return redirect()->route('auth.login')->with('sucess', "Inscription validée !");
    }

    /**
     * Déconnexion
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return to_route('home');
    }
}
