<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class TaskApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response|Collection|Builder
     */
    public function index(): Response|Collection|Builder
    {
        return Task::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response|null
     */
    public function create(): ?Response
    {
        return new Response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Task
     */
    public function store(Request $request): Task
    {
        $newTask = new Task();
        $newTask->title = $request->task['title'];
        $newTask->save();

        return $newTask;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        return new Response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        return new Response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return Response|Collection|Model
     */
    public function update(Request $request, int $id): Response|Collection|Model
    {
        $task = Task::findOrFail($id);

        if($task === null) {
            return new Response('TASK NOT FOUND!', 404);
        }

        if($request->task['completed'] === true && $task->isCompleted() === false) {
            $task->completed = true;
            $task->completed_at = Carbon::now();
            $task->save();
        }

        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $message = 'TASK NOT FOUND!';
        $status = 404;

        $task = Task::find($id);

        if($task !== null) {
            $message = 'TASK DELETED';
            $status = 200;
            $task->delete();
        }

        return new Response($message, $status);
    }
}
