<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Symfony\Component\HttpFoundation\Response;

class ErrorResponseResource extends BaseResource
{
    public function __construct(string $message, ?int $status = null)
    {
        parent::__construct($message);

        $this->status = $status;
    }

    protected function getResponse(): array
    {
        return [
            'message' => $this->resource,
            'status' => $this->getStatus(),
        ];
    }

    protected function getStatus(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }
}
