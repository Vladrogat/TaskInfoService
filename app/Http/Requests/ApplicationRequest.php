<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'name' => 'bail|required|min:5',
            'phone' => 'bail|required|min:11',
            'company' => 'bail|required|min:5',
            'title' => 'bail|required|min:5',
            'message' => 'bail|required|min:5',
            'file' => 'max:255'
        ];
    }
}
