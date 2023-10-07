<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\ArrayableEnumTrait;

enum TaskStatusEnum: int
{
    use ArrayableEnumTrait;

    case CREATED = 0;

    case COMPLETED = 1;
}
