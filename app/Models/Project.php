<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Project extends Model implements HasMedia
{
    use InteractsWithMedia;
    
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
        return $this->hasMany(\App\Models\BackwardChaining\BackwardChaining::class, 'project_id');
    }
    
    // backwardChainings for 1 project
    public function backwardChaining(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\BackwardChaining\BackwardChaining::class, 'project_id');
    }

    public function contributors(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Contributor::class, 'project_id');
    }

    public function methods(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\Method::class, 'project_has_methods');
    }

    public function sessionProject(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(\App\Models\User::class, 'session_project');
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class, 'user_has_projects');
    }

    public static function createUniqueSlug($title): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        // Cek apakah slug sudah digunakan sebelumnya (tanpa memperhatikan yang dihapus)
        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    // is published
    public function isPublished(): bool
    {
        return $this->status_publish === 'yes';
    }

}
