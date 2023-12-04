<?php

namespace App\Repositories;

use App\Models\BackwardChaining\BcGoal;
use App\Repositories\BaseRepository;

class BcGoalRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'backward_chaining_id',
        'name',
        'code_name',
        'reason',
        'solution'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return BcGoal::class;
    }
}
