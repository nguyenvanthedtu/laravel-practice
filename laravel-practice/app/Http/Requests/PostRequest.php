<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        switch($this->method()){
            case 'POST': {
                return [
                    'title' => 'required | max:200',
                    'image' => 'required',
                    'category_id' => 'required',
                    'content' => 'required|min:10',
                ];
            }
            case 'PATCH':{
                return [
                    'title' => 'required | max:200',
                    'image' => 'nullable',
                    'category_id' => 'required',
                    'content' => 'required|min:10',
                    'status' => '',
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
            'max' => 'The :attribute is maximum :max characters',
            'image' =>  'The :attribute is not a valid image',
            'mimes' =>  'The :attribute is not a valid image format',
            
        ];
    }
}
