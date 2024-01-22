<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserEditController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        return view('admin.user-edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('admin.user');
    }

    public function changePassword(Request $request, User $user)
    {
        $this->validate($request, [
            'password' => ['required', 'confirmed', 'min:5']
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('admin.user');
    }


}
