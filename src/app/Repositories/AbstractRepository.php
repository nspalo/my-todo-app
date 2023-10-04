<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    protected function getModel(): Model
    {
        return $this->model;
    }

    protected function getQuery(): Builder
    {
        return $this->model->newQuery();
    }
}
