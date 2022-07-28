<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'content' => 'required|min:4|max:1000',
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'The :attribute is required',
            'min' => 'The :attribute must be at least :min characters',
        
        ];
    }
}
