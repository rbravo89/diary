<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $items = User::all();
        return view('admin.user', ['items' => $items]);
    }
}
