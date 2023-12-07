<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BcRule extends Model
{
    public $table = 'bc_rules';

    public $fillable = [
        'bc_goal_id',
        'bc_evidence_id',
        'code_name'
    ];

    protected $casts = [
        'code_name' => 'string'
    ];

    public static array $rules = [
        'bc_goal_id' => 'required',
        'bc_evidence_id' => 'required',
        'code_name' => 'required|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function bcEvidence(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\BackwardChaining\BcEvidence::class, 'bc_evidence_id');
    }

    public function bcGoal(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\BackwardChaining\BcGoal::class, 'bc_goal_id');
    }
}
