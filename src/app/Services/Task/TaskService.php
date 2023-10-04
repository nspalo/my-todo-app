<?php

declare(strict_types=1);

namespace App\Services\Task;

use App\Http\Requests\Task\TaskRequest;
use App\Models\Task;
use App\Repositories\Task\Interfaces\TaskRepositoryInterface;
use App\Repositories\Task\Resources\TaskResource;
use App\Services\Task\Interfaces\TaskServiceInterface;
use Illuminate\Support\Collection;

class TaskService implements TaskServiceInterface
{
    private TaskRepositoryInterface $repository;

    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function creatTask(TaskRequest $request): Task
    {
        $validated = $request->validated();

        if(empty($validated) === true) {
            throw new \RuntimeException('Invalid Request data');
        }

        return $this->repository->create(
            new TaskResource($request->validated())
        );
    }

    public function listTask(): Collection
    {
        return $this->repository->findAll();
    }

    public function findTaskById(Task $task): Task
    {
        return $this->repository->findById($task->getId());
    }

    public function updateTask(Task $task, TaskRequest $request): Task
    {
        $validated = $request->validated();

        if(empty($validated) === true) {
            throw new \RuntimeException('Invalid Request data');
        }

        return $this->repository->update(
            $task,
            new TaskResource($request->validated())
        );
    }
}
