<?php

namespace App\Http\Controllers\Technical;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Project;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TechnicalRequirementController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $upload = \Storage::disk('uploads')->put('/', $file);
        return response()->json(['file' => $upload,
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize()]);
    }

    public function update(Request $request, Requirement $requirement)
    {
        $this->validate($request, [
            'solution' => ['required'],
        ]);
        $requirement->update([
            'state' => 'CLOSE',
            'solution' => $request->solution,
            'solution_date' => now()
        ]);
        Attachment::create([
            'name' => $request->file_name,
            'url' => $request->file,
            'requirement_id' => $requirement->id
        ]);
        return redirect()->route('technical.project.requirement', $requirement->project_id);
    }

    public function download(Requirement $requirement)
    {
        $file = $requirement->attachments()->get()->first();
        if ($file === null) {
            return back();
        }
        return \Storage::disk('uploads')->download($file->url, $file->name);
    }
}
