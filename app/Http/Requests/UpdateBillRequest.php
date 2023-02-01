<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateBillRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $method = $this->method();
        if($method == 'PUT'){
            return [
                'user_id' => [
                    'required',
                    'exists:App\Models\User,id',
                    Rule::unique('App\Models\Feedback')->where(function ($query) use ($request) {
                        return $query->where('course_id', $request->course_id);
                     }),
                ],
                'course_id' => ['required','exists:App\Models\Course,id'],
                'pay' => ['required','numeric'],
            ];
        }else{
            return [
                'user_id' => [
                    'sometimes',
                    'required',
                    'exists:App\Models\User,id',
                    Rule::unique('App\Models\Feedback')->where(function ($query) use ($request) {
                        return $query->where('course_id', $request->course_id);
                     }),
                ],
                'course_id' => ['sometimes','required','exists:App\Models\Course,id'],
                'pay' => ['sometimes','required','numeric'],
            ];
        }
        
    }
}
