<?php

namespace App\Http\Requests\API\Course;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['sometimes'],
            'details' => ['sometimes'],
            'content' => ['sometimes'],
            'price' => ['sometimes', 'numeric'],
            'lecturer_id' => ['sometimes', 'numeric'],
        ];
    }
}