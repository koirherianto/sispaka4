<?php

namespace App\Repositories;

use App\Models\ForwardChaining\FcGoal;
use App\Repositories\BaseRepository;

class FcGoalRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'forward_chaining_id',
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
        return FcGoal::class;
    }
}
