<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\WorkspaceUser;
use Illuminate\Http\Request;

class WorkspaceUserController extends Controller
{
    public function store(Request $request)
    {
        WorkspaceUser::create([
            'workspace_id' => $request->workspace_id,
            'user_id' => $request->user_id,
        ]);

        return response()->json(['message' => 'User added to workspace successfully'], 200);
    }
}
