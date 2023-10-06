<?php

declare(strict_types=1);

namespace App\Http\Resources\Task;

use App\Http\Resources\BaseResource;

class TaskResource extends BaseResource
{
    protected function getResponse(): array
    {
        return $this->resource->toArray();
    }
}
