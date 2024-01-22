<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('message', 'Credenciales incorrectas');
        }

        $user = auth()->user();
        if ($user->role === 'ACCOUNT_MANAGER') {
            if ($user->organization === null || $user->organization->state !== 'ACCEPTED') {
                auth()->logout();
                return back()->with('message', 'Tú organización no ha sido validada');
            }
        }
        return redirect()->route('index');
    }
}
