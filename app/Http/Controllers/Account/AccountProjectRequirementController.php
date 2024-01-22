<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\View\View;

class AccountProjectRequirementController extends Controller
{
    public function index(Project $project): View
    {
        return view('account.project-requirement', ['project' => $project]);
    }
}
