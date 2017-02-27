<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchedulePage extends FormRequest
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
            'firstName' => 'required|alpha|max:15',
            'lastName'  => 'required|alpha|max:15',
            'email' => 'required|email',
            'number' => 'required|numeric|max:12',
            'city' => 'required',
            'zip' => 'required|numeric|max:5',
            'street' => 'required|max:25',
            'message' => 'required|max:200',
        ];
    }
}
