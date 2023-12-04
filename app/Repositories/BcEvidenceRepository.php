<?php

namespace App\Repositories;

use App\Models\BcEvidence;
use App\Repositories\BaseRepository;

class BcEvidenceRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'backward_chaining_id',
        'name',
        'code_name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return BcEvidence::class;
    }
}
