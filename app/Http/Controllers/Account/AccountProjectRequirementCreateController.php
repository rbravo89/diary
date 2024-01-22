<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Requirement;
use Illuminate\Http\Request;

class AccountProjectRequirementCreateController extends Controller
{
    public function index(Project $project)
    {
        return view('account.account-requirement-create', ['project' => $project]);
    }

    public function store(Request $request, Project $project)
    {
        $this->validate($request, [
            'description' => ['required'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date']
        ]);
        Requirement::create([
            'project_id' => $project->id,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'state' => 'PENDING'
        ]);
        return redirect()->route('account-project-requirement', $project);
    }
}
