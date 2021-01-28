<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewQuestion extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "user_id" => "bail | required",
            "exam_id" => "bail | required",
            "qs_id" => "bail | required",
            "is_marked" => "bail | required | digits_between:0,1",
            "option" => "required | array | min:1"
        ];
    }

    public function messages()
    {
        return [
            "user_id" => "Internal Error",
            "exam_id" => "Internal Error",
            "qs_id" => "Internal Error",
            "is_marked" => "Invalid Operation",
            "option.required" => "At least one option to be selected to mark question for review",
            "option.min" => "At least one option to be selected to mark question for review",
            "option" => "Internal Error"
        ];
    }
    public function withValidator($validator)
    {
        if ($validator->fails()) 
            request()->session()->reflash();

    }
}
