<?php

declare(strict_types=1);

namespace App\Enums;

use App\Traits\ArrayableEnumTrait;

enum TaskStatusEnum: string
{
    use ArrayableEnumTrait;

    case CREATED = 'created';

    case IN_PROGRESS = 'in_progress';

    case COMPLETED = 'completed';
}
