<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'descriptions', 'project_id', 'file', 'status'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
