<?php

namespace App\Repositories;

use App\Models\BcRule;
use App\Repositories\BaseRepository;

class BcRuleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'bc_goal_id',
        'bc_evidence_id',
        'code_name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return BcRule::class;
    }
}
