<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\Task\TaskRequest;
use App\Http\Resources\ErrorResponseResource;
use App\Http\Resources\Task\TaskResource as TaskResponseResource;
use App\Models\Task;
use App\Services\Task\Interfaces\TaskServiceInterface;
use Exception;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ApiTaskController extends ApiBaseController
{
    private TaskServiceInterface $service;

    public function __construct(TaskServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index(): ResourceCollection
    {
        return TaskResponseResource::collection(
            $this->service->listTask()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Task\TaskRequest $request
     * @return ErrorResponseResource
     */
    public function store(TaskRequest $request): ErrorResponseResource|TaskResponseResource
    {
        try {
            $task = $this->service->creatTask($request);
        } catch (Exception $e) {
            return $this->apiErrorResponse($e->getMessage());
        }

        return new TaskResponseResource($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Resources\Json\JsonResource|\App\Http\Resources\Task\TaskResource
     */
    public function show(Task $task): TaskResponseResource
    {
        $task = $this->service->getTask($task);

        return new TaskResponseResource($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Task\TaskRequest $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Resources\Json\JsonResource|\App\Http\Resources\Task\TaskResource
     */
    public function update(TaskRequest $request, Task $task): TaskResponseResource
    {
        try {
            $task = $this->service->updateTask($task, $request);
        } catch (Exception $e) {
            return $this->apiErrorResponse($e->getMessage());
        }

        return new TaskResponseResource($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function destroy(Task $task): JsonResource
    {
        $task->delete();

        return $this->apiNoContentResponse();
    }
}
