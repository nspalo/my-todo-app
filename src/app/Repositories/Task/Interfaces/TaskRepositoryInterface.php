<?php

declare(strict_types=1);

namespace App\Repositories\Task\Interfaces;

use App\Models\Task;
use App\Repositories\Task\Resources\TaskResource;
use Illuminate\Support\Collection;

interface TaskRepositoryInterface
{
    public function create(TaskResource $resource): Task;

    public function findAll(): Collection;

    public function update(Task $task, TaskResource $resource): Task;
}
