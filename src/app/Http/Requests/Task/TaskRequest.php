<?php

declare(strict_types=1);

namespace App\Http\Requests\Task;

use App\Enums\TaskStatusEnum;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function getTitle(): string
    {
        return $this->get('title');
    }

    public function getStatus(): TaskStatusEnum
    {
        if ($this->has('status') === false) {
            return TaskStatusEnum::CREATED;
        }

        return TaskStatusEnum::create(
            $this->get('status')
        );
    }

    public function getCompleted(): ?bool
    {
        return (bool) $this->get('completed');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $allowedStatus = implode(',', TaskStatusEnum::names());

        return [
            'title' => ['sometimes', 'required', 'string'],
            'status' => ['sometimes', 'required', 'in:' . $allowedStatus],
            'completed' => ['sometimes', 'required', 'boolean'],
        ];
    }
}
