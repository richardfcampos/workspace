<?php

use App\Http\Controllers\api\WorkspacesController;
use App\Http\Controllers\api\WorkspaceUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('workspace', [WorkspacesController::class, 'store']);

Route::post('workspaceUser', [WorkspaceUserController::class, 'store']);
