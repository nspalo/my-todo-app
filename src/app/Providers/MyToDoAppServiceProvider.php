<?php

namespace App\Providers;

use App\Repositories\Task\Interfaces\TaskRepositoryInterface;
use App\Repositories\Task\TaskRepository;
use App\Services\Task\Interfaces\TaskServiceInterface;
use App\Services\Task\TaskService;
use Illuminate\Support\ServiceProvider;

class MyToDoAppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(TaskServiceInterface::class, TaskService::class);
    }
}
