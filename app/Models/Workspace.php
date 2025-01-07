<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workspace extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'owner_id'
    ];


    public function users()
    {
        return $this->hasManyThrough(User::class, WorkspaceUser::class, 'workspace_id', 'id', 'id', 'user_id')
            ->where('is_owner', false);

    }

    public function owner()
    {
        return $this->hasOneThrough(User::class, WorkspaceUser::class, 'workspace_id', 'id', 'owner_id', 'id')
            ->where('is_owner', true);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
