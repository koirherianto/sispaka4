<?php

namespace App\Repositories;

use App\Models\ForwardChaining\ForwardChaining;
use App\Repositories\BaseRepository;

class ForwardChainingRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'project_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ForwardChaining::class;
    }
}
