<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;

class AccountProjectController extends Controller
{
    public function index(User $user)
    {
        $projects = $user->organization->projects()->wherePivot('type', 'OWNER');
        return view('account.project', ['items' => $projects->get()]);
    }
}
