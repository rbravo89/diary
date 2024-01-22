<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Organization::all();
        return view('admin.organization', ['items' => $items]);
    }

    public function accepted(Request $request, Organization $organization)
    {
        $organization->state = 'ACCEPTED';
        $organization->save();
        return back();
    }

    public function rejected(Request $request, Organization $organization)
    {
        $organization->state = 'REJECTED';
        $organization->save();
        return back();
    }

    public function cancelled(Request $request, Organization $organization)
    {
        $organization->state = 'CANCELLED';
        $organization->save();
        return back();
    }

    public function active(Request $request, Organization $organization)
    {
        $organization->state = 'ACCEPTED';
        $organization->save();
        return back();
    }
}
