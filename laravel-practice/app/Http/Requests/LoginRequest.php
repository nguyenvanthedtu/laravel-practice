<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required | email |  ',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute is required',
            'email' => 'The :attribute is invalidate',
            'unique' => 'The :attribute is  already exists on the system'
        ];
    }

    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->errors()->count() > 0) {
                $validator->errors()->add('msg', 'Please check the input data.');
            }
        });
    }
}
