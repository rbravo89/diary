<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountProjectCreateController extends Controller
{
    public function index()
    {
        return view('account.project-create');
    }

    public function store(Request $request)
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
        DB::beginTransaction();
        $project = new Project();
        $project->name = $request->name;
        $project->public = $request->public;
        $project->objective = $request->objective;
        $project->beneficiaries = $request->beneficiaries;
        $project->location = $request->location;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->state = 'PLANING';
        $project->save();

        $orginizationId = auth()->user()->organization->id;
        $project->organizations()->attach($orginizationId, ['type' => 'OWNER']);
        DB::commit();
        return redirect()->route('account.projects', auth()->user());
    }
}

