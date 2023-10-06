<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseResource extends JsonResource
{
    protected ?int $status = null;

    abstract protected function getResponse(): array;

    protected function getStatus(): int
    {
        return Response::HTTP_OK;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return $this->getResponse();
    }
}
