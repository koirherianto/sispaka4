<?php

namespace App\Models\ForwardChaining;

use Illuminate\Database\Eloquent\Model;

class FcEvidence extends Model
{
    public $table = 'fc_evidences';

    public $fillable = [
        'forward_chaining_id',
        'name',
        'code_name'
    ];

    protected $casts = [
        'name' => 'string',
        'code_name' => 'string'
    ];

    public static array $rules = [
        'forward_chaining_id' => 'required',
        'name' => 'required|string|max:200',
        'code_name' => 'required|string|max:100',
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
        return $this->hasMany(\App\Models\FcRule::class, 'fc_evidence_id');
    }
}
