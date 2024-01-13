<?php

namespace App\Repositories;

use App\Models\ForwardChaining\FcRuleGroup;
use App\Repositories\BaseRepository;

class FcRuleGroupRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'forward_chaining_id',
        'code_name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return FcRuleGroup::class;
    }
}
