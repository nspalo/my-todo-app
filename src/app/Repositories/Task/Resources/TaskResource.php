<?php

declare(strict_types=1);

namespace App\Repositories\Task\Resources;

use App\Enums\TaskStatusEnum;
use App\Traits\Initialisable;
use App\Traits\InitialisableTrait;

class TaskResource implements Initialisable
{
    use InitialisableTrait;

    private string $title;

    private ?TaskStatusEnum $status = null;

    private bool $completed = false;

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setStatus(TaskStatusEnum $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function setCompleted(bool $completed): void
    {
        $this->completed = $completed;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStatus(): TaskStatusEnum
    {
        if($this->status === null) {
            $this->status = TaskStatusEnum::CREATED;
        }

        return $this->status;
    }

    public function getCompleted(): bool
    {
        return $this->completed;
    }
}
