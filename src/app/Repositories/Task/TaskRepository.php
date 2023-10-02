<?php

declare(strict_types=1);

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\Task\Interfaces\TaskRepositoryInterface;
use App\Repositories\Task\Resources\TaskResource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    public function create(TaskResource $resource): Task
    {
        $task = (new Task())
            ->setTitle($resource->getTitle())
            ->setCompleted($resource->getCompleted());

        $task->save();

        return $task;
    }

    public function findAll(): Collection
    {
        return Task::all();
    }

    public function update(Task $task, TaskResource $resource): Task
    {
        $task->setTitle($resource->getTitle())
            ->setCompleted($resource->getCompleted())
            ->setCompletedAt(Carbon::now());
        $task->save();

        return $task;
    }
}
