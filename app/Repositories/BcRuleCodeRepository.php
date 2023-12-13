<?php

namespace App\Repositories;

use App\Models\BcRuleCode;
use App\Repositories\BaseRepository;

class BcRuleCodeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'backward_chaining_id',
        'code_name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return BcRuleCode::class;
    }
}
