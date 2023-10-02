<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\TaskRequest;
use App\Http\Resources\Task\TaskResource as TaskResponseResource;
use App\Models\Task;
use App\Repositories\Task\Interfaces\TaskRepositoryInterface;
use App\Repositories\Task\Resources\TaskResource as TaskDbResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class ApiTaskController extends Controller
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(): ResourceCollection
    {
        return TaskResponseResource::collection(
            $this->taskRepository->findAll()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Task\TaskRequest $request
     * @return \App\Http\Resources\Task\TaskResource
     */
    public function store(TaskRequest $request): TaskResponseResource
    {
        $task = $this->taskRepository->create(
            new TaskDbResource($request->validated())
        );

        return new TaskResponseResource($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \App\Http\Resources\Task\TaskResource
     */
    public function show(Task $task): TaskResponseResource
    {
        return new TaskResponseResource($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Task\TaskRequest $request
     * @param  \App\Models\Task  $task
     * @return \App\Http\Resources\Task\TaskResource
     */
    public function update(TaskRequest $request, Task $task): TaskResponseResource
    {
        $task = $this->taskRepository->update(
            $task,
            new TaskDbResource($request->validated())
        );

        return new TaskResponseResource($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task): Response
    {
        $task->delete();

        return response()->noContent();
    }
}
