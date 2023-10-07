<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Resources\EmptyResponseResource;
use App\Http\Resources\ErrorResponseResource;

abstract class ApiBaseController
{
    public function apiErrorResponse(string $message, ?int $status = null): ErrorResponseResource
    {
        return new ErrorResponseResource($message, $status);
    }

    public function apiNoContentResponse(): EmptyResponseResource
    {
        return new EmptyResponseResource();
    }
}
