<?php

declare(strict_types=1);

namespace App\Http\Resources\Task;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \JsonSerializable|\Illuminate\Contracts\Support\Arrayable|array
     */
    public function toArray($request): JsonSerializable|Arrayable|array
    {
        return parent::toArray($request);
    }
}
