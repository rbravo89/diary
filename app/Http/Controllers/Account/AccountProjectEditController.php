<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AccountProjectEditController extends Controller
{
    public function index(Project $project)
    {
        return view('account.project-edit', ['project' => $project]);
    }

    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'name' => ['required'],
            'objective' => ['required'],
            'location' => ['required'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'public' => ['required'],
            'beneficiaries' => ['required', 'numeric', 'min:1']
        ]);
        $project->update($request->all());
        return redirect()->route('account.projects');
    }
}
