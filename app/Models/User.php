<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable implements HasMedia
{
    use HasRoles,InteractsWithMedia;

    public $table = 'users';

    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:191',
        'email' => 'required|string|max:191',
        'email_verified_at' => 'nullable',
        'password' => 'required|string|max:191',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function projects() : \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'user_has_projects', 'user_id', 'project_id');
    }

    public function sessionProjects()
    {
        return $this->belongsTo(Project::class,'session_project');
    }

    public function sessionProjecthasBackwardChainingMethod(): bool
    {
        $sessionProject = Auth::user()->session_project;
        if (!$sessionProject) {
            return false;
        }
        
        $project = Project::find($sessionProject);
        if (!$project) {
            return false;
        }

        // Dapatkan semua metode yang dimiliki oleh proyek ini
        $methods = $project->methods ?? [];

        // Loop melalui metode-metode dan periksa jika ada yang memiliki nama "backward-chaining"
        foreach ($methods as $method) {
            if ($method->slug === 'backward-chaining') {
                return true;
            }
        }

        return false;
    }
    
}
