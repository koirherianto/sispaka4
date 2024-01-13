<?php

namespace App\Models\ForwardChaining;

use Illuminate\Database\Eloquent\Model;

class FcGoal extends Model
{
    public $table = 'fc_goals';

    public $fillable = [
        'forward_chaining_id',
        'name',
        'code_name',
        'reason',
        'solution'
    ];

    protected $casts = [
        'name' => 'string',
        'code_name' => 'string',
        'reason' => 'string',
        'solution' => 'string'
    ];

    public static array $rules = [
        'forward_chaining_id' => 'required',
        'name' => 'required|string|max:200',
        'code_name' => 'required|string|max:100',
        'reason' => 'nullable|string|max:65535',
        'solution' => 'nullable|string|max:65535',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function forwardChaining(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\ForwardChaining\ForwardChaining::class, 'forward_chaining_id');
    }

    public function fcRules(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\FcRule::class, 'fc_goal_id');
    }
}
