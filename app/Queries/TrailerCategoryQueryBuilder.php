<?php

namespace App\Queries;

use App\Models\TrailerCategory;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * @extends QueryBuilder<TrailerCategory>
 */
class TrailerCategoryQueryBuilder extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(TrailerCategory::query());

        $this->allowedFilters(['name'])
            ->allowedSorts(['name']);
    }
}
