<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AccountEditController extends Controller
{
    public function index(User $user)
    {
        return view('account.account-edit', ['user' => $user]);
    }

    public function updatePersonalSettings(Request $request, User $user)
    {
        $user->update($request->all());
        return back();
    }

    public function updateOrganization(Request $request, User $user)
    {
        $organization = $user->organization;
        $organization->update($request->all());
        return back();
    }
}
