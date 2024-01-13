<?php

namespace App\Models\ForwardChaining;

use Illuminate\Database\Eloquent\Model;

class ForwardChaining extends Model
{
    public $table = 'forward_chainings';

    public $fillable = [
        'project_id'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        'project_id' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Project::class, 'project_id');
    }

    public function fcEvidences(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\FcEvidence::class, 'forward_chaining_id');
    }

    public function fcGoals(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\ForwardChaining\FcGoal::class, 'forward_chaining_id');
    }

    public function fcRuleGroups(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\FcRuleGroup::class, 'forward_chaining_id');
    }
}
