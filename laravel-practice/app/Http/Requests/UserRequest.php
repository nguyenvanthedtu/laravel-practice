<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST': {
                    return [
                        'fullname' => 'required',
                        'email' => 'required | email | unique:users,email',
                        'password' => 'required | min:8 | max:20 ',
                        'confirm_password' => 'required|min:8|max:20|same:password',
                        'gender',
                    ];
                }
            case 'PATCH': {
                    return [
                        'fullname' => 'required',
                        'email' => Rule::unique('users')->ignore($this->id),
                        'role' => 'required',
                        'gender',
                    ];
                }
        }
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute is required',
            'email' => 'The :attribute is invalidate',
            'min' => 'The :attribute is minimum :min characters',
            'unique' => 'The :attribute is  already exists on the system',

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
