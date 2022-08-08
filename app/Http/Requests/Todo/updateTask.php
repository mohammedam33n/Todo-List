<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;

class updateTask extends FormRequest
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
            'title'      => 'required|min:5|max:40',
            'desc'     => 'required|min:10|max:200',
            'status'     => 'required',

        ];
    }

    public function messages()
    {
        return [
            'desc.required'     => 'The desciption field is required.',
        ];
    }
}
