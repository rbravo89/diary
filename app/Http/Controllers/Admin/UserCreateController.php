<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserCreateController extends Controller
{
    public function index()
    {
        return view('admin.user-create');
    }

    public function store(Request $request, User $user)
    {

        $this->validate($request, [
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required', 'unique:users', 'email', 'max:60'],
            'password' => ['required', 'min:5'],
            'role' => ['required']
        ]);
        User::create([
            'name' => $request->names,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);
        return redirect()->route('admin.user');
    }
}
