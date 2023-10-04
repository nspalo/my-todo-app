<?php

declare(strict_types=1);

namespace App\Services\Task\Interfaces;

use App\Http\Requests\Task\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Collection;

interface TaskServiceInterface
{
    public function creatTask(TaskRequest $request): Task;

    public function listTask(): Collection;

    public function findTaskById(Task $task): Task;

    public function updateTask(Task $task, TaskRequest $request): Task;
}
