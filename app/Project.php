<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Stops mass assign error
    protected $guarded = [];

    // Method that when called returns the correct url path for a single project using its ID
    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }
}
