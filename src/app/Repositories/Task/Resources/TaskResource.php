<?php

declare(strict_types=1);

namespace App\Repositories\Task\Resources;

use App\Traits\Initialisable;
use App\Traits\InitialisableTrait;

class TaskResource implements Initialisable
{
    use InitialisableTrait;

    private string $title;

    private bool $completed;

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setCompleted(?bool $completed): void
    {
        if($completed === null) {
            $completed = false;
        }

        $this->completed = $completed;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCompleted(): bool
    {
        return $this->completed;
    }
}
