<?php

namespace App\Http\Requests\TrailerCategory;

use Illuminate\Foundation\Http\FormRequest;

class TrailerCategoryIndexRequest extends FormRequest
{
    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'per_page' => ['nullable', 'integer', 'min:1', 'max:255'],
        ];
    }

    public function perPage(): ?int
    {
        /** @var int|null $perPage */
        $perPage = $this->validated('per_page');

        return $perPage;
    }
}
