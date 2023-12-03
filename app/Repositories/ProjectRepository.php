<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\BaseRepository;

class ProjectRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'status_publish',
        'slug',
        'seo_keyword',
        'seo_description',
        'content'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Project::class;
    }
}
