<?php

namespace App\Repositories;

use App\Models\ForwardChaining\FcEvidence;
use App\Repositories\BaseRepository;

class FcEvidenceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'forward_chaining_id',
        'name',
        'code_name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return FcEvidence::class;
    }
}
