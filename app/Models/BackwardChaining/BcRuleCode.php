<?php

namespace App\Models\BackwardChaining;;

use Illuminate\Database\Eloquent\Model;

class BcRuleCode extends Model
{
    public $table = 'bc_rule_codes';

    public $fillable = [
        'backward_chaining_id',
        'code_name'
    ];

    protected $casts = [
        'code_name' => 'string'
    ];

    public static array $rules = [
        'backward_chaining_id' => 'required',
        'code_name' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function backwardChaining(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\BackwardChaining\BackwardChaining::class, 'backward_chaining_id');
    }

    public function bcRules(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\BackwardChaining\BcRule::class, 'bc_rule_code_id');
    }
}
