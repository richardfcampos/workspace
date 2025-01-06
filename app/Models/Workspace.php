<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workspace extends Model
{
    use SoftDeletes;

    protected $fillable = [
      'name'
    ];


    public function users()
    {
        return $this->hasManyThrough(User::class, WorkspaceUser::class, 'workspace_id', 'id', 'id', 'user_id');

    }

    public function owner()
    {
        $this->users->where('is_owner', true)->first();
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
