<?php

declare(strict_types=1);

namespace App\Http\Requests\Task;

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

    public function getCompleted(): ?bool
    {
        return (bool)$this->get('completed');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'required', 'string'],
            'completed' => ['sometimes', 'required', 'boolean'],
        ];
    }
}
