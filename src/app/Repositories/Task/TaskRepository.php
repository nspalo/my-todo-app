<?php

declare(strict_types=1);

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\AbstractRepository;
use App\Repositories\Task\Interfaces\TaskRepositoryInterface;
use App\Repositories\Task\Resources\TaskResource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class TaskRepository extends AbstractRepository implements TaskRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Task());
    }

    public function create(TaskResource $resource): Task
    {
        $task = (new Task())
            ->setTitle($resource->getTitle())
            ->setStatus($resource->getStatus())
            ->setCompleted($resource->getCompleted());

        $task->save();

        return $task;
    }

    public function findAll(): Collection
    {
        return $this->getQuery()->get();
    }

    public function findById(int $taskId): Task
    {
        /** @var \App\Models\Task $model */
        $model = $this->getQuery()
            ->where('id', '=', $taskId)
            ->first();

        return $model;
    }

    public function update(Task $task, TaskResource $resource): Task
    {
        $task->setTitle($resource->getTitle())
            ->setStatus($resource->getStatus())
            ->setCompleted($resource->getCompleted())
            ->setCompletedAt(Carbon::now());
        $task->save();

        return $task;
    }
}
