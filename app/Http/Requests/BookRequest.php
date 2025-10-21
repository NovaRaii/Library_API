<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if ($this->isMethod('put')) {
            return [
                'name' => 'sometimes|string|min:3|max:255',
                'category_id' => 'sometimes|integer',
                'price' => 'sometimes|numeric',
                'publication_date' => 'sometimes|date',
                'edition' => 'sometimes|integer',
                'author_id' => 'sometimes|integer',
                'isbn' => 'sometimes|string|min:3|max:255',
                'cover' => 'sometimes|string|min:3|max:255',
            ];
        }

        return [
            'name' => 'required|string|min:3|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'publication_date' => 'required|date',
            'edition' => 'required|integer',
            'author_id' => 'required|integer',
            'isbn' => 'required|string|min:3|max:255',
            'cover' => 'required|string|min:3|max:255',
        ];
    }
}
