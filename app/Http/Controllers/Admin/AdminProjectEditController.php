<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProjectEditController extends Controller
{
    public function index(Project $project)
    {
        $technicians = User::where('role', '=', 'TECHNICAL')->get();
        $organizations = array();
        foreach ($project->organizations as $item) {
            $organizations[] = $item->id;
        }

        $organizations = Organization::whereNotIn('id', $organizations)->get();
        return view('admin.project-edit', ['project' => $project,
            'technicians' => $technicians,
            'organizations' => $organizations]);
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return redirect()->route('admin.project');
    }

    public function addOrganization(Request $request, Project $project)
    {
        $this->validate($request, [
            'organization_id' => ['required', 'numeric']
        ]);
        $project->organizations()->attach($request->organization_id, ['type' => 'COLLABORATOR']);
        return back();
    }

    public function removeOrganization(Request $request, Project $project, $organization)
    {
        $project->organizations()->detach($organization);
        return back();
    }
}
