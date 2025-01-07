<?php

namespace App\Http\Controllers;

use App\Models\Workspace;

class WorkspacesController extends Controller
{
    public function index()
    {
        $workspaces = Workspace::paginate(20);

        return Inertia('Workspaces', ['workspaces' => $workspaces]);
    }

    public function show($id)
    {
        $workspace = Workspace::with('users', 'owner', 'documents')->find($id);

        return Inertia('Workspace', ['workspace' => $workspace]);
    }
}
