<?php

namespace App\Repositories;

use App\Models\FcRule;
use App\Repositories\BaseRepository;

class FcRuleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'fc_goal_id',
        'fc_evidence_id',
        'fc_rule_code_id',
        'optional_question'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return FcRule::class;
    }
}
