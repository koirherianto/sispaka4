<?php

namespace App\Models\BackwardChaining;

use Illuminate\Database\Eloquent\Model;

class BcEvidence extends Model
{
    public $table = 'bc_evidence';

    public $fillable = [
        'backward_chaining_id',
        'name',
        'code_name'
    ];

    protected $casts = [
        'name' => 'string',
        'code_name' => 'string'
    ];

    public static array $rules = [
        'backward_chaining_id' => 'required',
        'name' => 'required|string|max:200',
        'code_name' => 'required|string|max:100',
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
        return $this->hasMany(\App\Models\BackwardChaining\BcRule::class, 'bc_evidence_id');
    }
}
