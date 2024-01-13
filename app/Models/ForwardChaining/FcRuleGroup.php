<?php

namespace App\Models\ForwardChaining;

use Illuminate\Database\Eloquent\Model;

class FcRuleGroup extends Model
{
    public $table = 'fc_rule_groups';

    public $fillable = [
        'forward_chaining_id',
        'code_name'
    ];

    protected $casts = [
        'code_name' => 'string'
    ];

    public static array $rules = [
        'forward_chaining_id' => 'required',
        'code_name' => 'required|string|max:255',
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
        return $this->hasMany(\App\Models\FcRule::class, 'fc_rule_code_id');
    }
}
