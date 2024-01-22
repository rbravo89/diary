<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //validate
        DB::beginTransaction();
        $this->validate($request, [
            'business-name' => ['required'],
            'ruc' => ['required', 'unique:organizations', 'min:10', 'numeric'],
            'names' => ['required'],
            'surname' => ['required'],
            'email' => ['required', 'unique:users', 'email', 'max:60'],
            'password' => ['required', 'confirmed', 'min:5']
        ]);

        $organization = Organization::create([
            'name' => $request['business-name'],
            'ruc' => $request->ruc
        ]);

        User::create([
            'name' => $request->names,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'ACCOUNT_MANAGER',
            'organization_id' => $organization->id
        ]);
        DB::commit();
        return redirect()->route('login');
    }
}
