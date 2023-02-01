<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTestRequest extends FormRequest
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
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'lesson_id' => [
                    'required',
                    Rule::exists('App\Models\Lesson','id'),
                ],
                'content' => ['required'],
            ];
        }else{
            return [
                'lesson_id' => [
                    'sometimes',
                    'required',
                    Rule::exists('App\Models\Lesson','id'),
                ],
                'content' => ['sometimes','required'],
            ];
        }

        
    }
}
