<?php

namespace App\Http\Controllers;

use App\Models\Project;

class IndexController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = [];
        if (auth()->user()->role === 'ADMINISTRATOR') {
            $projects = Project::all();
        }
        if (auth()->user()->role === 'ACCOUNT_MANAGER') {
            $projects = auth()->user()->organization->projects;
        }
        if (auth()->user()->role === 'TECHNICAL') {
            $projects = auth()->user()->projects;
        }
        return view('index', ['projects' => $projects]);
    }
}
