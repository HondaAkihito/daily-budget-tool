<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateData extends FormRequest
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
            'amount' => 'required|integer|max:11',
            'title' => 'required|max:20',
            'date' => 'required|date',
            'file' => 'required|file|image|mimes:jpeg,jpg,png,webp,tiff,svg',
        ];
    }
}
