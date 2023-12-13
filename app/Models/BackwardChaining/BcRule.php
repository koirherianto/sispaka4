<?php

namespace App\Models\BackwardChaining;;

use Illuminate\Database\Eloquent\Model;

class BcRule extends Model
{
    public $table = 'bc_rules';

    public $fillable = [
        'bc_goal_id',
        'bc_evidence_id',
        'bc_rule_code_id',
        'optional_question'
    ];

    protected $casts = [
        'optional_question' => 'string'
    ];

    public static array $rules = [
        'bc_goal_id' => 'required',
        'bc_evidence_id' => 'required',
        'bc_rule_code_id' => 'required',
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

    public function bcRuleCode(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\BackwardChaining\BcRuleCode::class, 'bc_rule_code_id');
    }
}
