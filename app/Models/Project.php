<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $table = 'projects';

    public $fillable = [
        'title',
        'status_publish',
        'slug',
        'seo_keyword',
        'seo_description',
        'content'
    ];

    protected $casts = [
        'title' => 'string',
        'status_publish' => 'string',
        'slug' => 'string',
        'seo_keyword' => 'string',
        'seo_description' => 'string',
        'content' => 'string'
    ];

    public static array $rules = [
        'title' => 'required|string|max:100',
        'status_publish' => 'required|string',
        'slug' => 'required|string|max:130',
        'seo_keyword' => 'nullable|string|max:100',
        'seo_description' => 'nullable|string|max:160',
        'content' => 'nullable|string|max:65535',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function backwardChainings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\BackwardChaining::class, 'project_id');
    }

    public function contributors(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Contributor::class, 'project_id');
    }

    public function methods(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Method::class, 'project_has_methods');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\User::class, 'session_project');
    }

    public function user1s(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class, 'user_has_projects');
    }
}
