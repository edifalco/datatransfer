<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFile extends FormRequest
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
            'file' => 'required|mimes:csv,txt|max:100000',
            'terms' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'file.required'=>'The file is required, select a .csv file to upload.',
            'file.mimes:csv,txt'=>'We only accept .css files, upload a .csv file.',
        ];
    }
}
