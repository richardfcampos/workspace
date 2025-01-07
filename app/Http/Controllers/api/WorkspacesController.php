<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workspace;
use App\Models\WorkspaceUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class WorkspacesController extends Controller
{
    public function store(Request $request)
    {
        $validUser = User::find($request->user_id);
        if (!$validUser) {
            return response()->json(['error' => 'Invalid user ID'], 400);
        }


        DB::transaction(function () use ($request, $validUser) {
            $workspace = Workspace::create([
                'name' => $request->name,
                'owner_id' => $request->user_id,
            ]);

            WorkspaceUser::create([
                'user_id' => $validUser->id,
                'is_owner' => true,
                'workspace_id' => $workspace->id,
            ]);
        });


        return redirect('/workspaces');
    }
}
