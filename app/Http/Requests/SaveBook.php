<?php

namespace App\Http\Requests;

use App\Models\Book;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;
use function PHPUnit\Framework\assertNotTrue;

class SaveBook extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:100'],
            'author' => ['required', 'string', 'max:100'],
            'description' => ['required', 'string'],
            'published_year' => ['required', 'date_format:Y'],
            'status' => [
                'string',
                Rule::in(Book::getStatusList())
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'published_year.date_format' => 'The published year field must match the format: YYYY (e.g 2024).',
        ];
    }
}
