<?php

namespace App\Http\Controllers\Technical;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Requirement;

class TechnicalProjectController extends Controller
{
    public function index()
    {
        $items = auth()->user()->projects()->get();
        return view('technical.technical-project', ['items' => $items]);
    }

    public function ViewRequirements(Project $project)
    {
        return view('technical.technical-requirement', ['project' => $project]);
    }

    public function ViewRequirement(Requirement $requirement)
    {
        return view('technical.technical-requirement-edit', ['requirement' => $requirement]);
    }
}
