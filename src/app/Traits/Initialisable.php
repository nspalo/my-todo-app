<?php

declare(strict_types=1);

namespace App\Traits;

interface Initialisable
{
    public function __construct(?array $payload = []);
}
