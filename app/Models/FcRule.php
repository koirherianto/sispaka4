<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FcRule extends Model
{
    public $table = 'fc_rules';

    public $fillable = [
        'fc_goal_id',
        'fc_evidence_id',
        'fc_rule_code_id',
        'optional_question'
    ];

    protected $casts = [
        'optional_question' => 'string'
    ];

    public static array $rules = [
        'fc_goal_id' => 'required',
        'fc_evidence_id' => 'required',
        'fc_rule_code_id' => 'required',
        'optional_question' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function fcGoal(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\FcGoal::class, 'fc_goal_id');
    }

    public function fcRuleCode(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\FcRuleGroup::class, 'fc_rule_code_id');
    }

    public function fcEvidence(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\FcEvidence::class, 'fc_evidence_id');
    }
}
