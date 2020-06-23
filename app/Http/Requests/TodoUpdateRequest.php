<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoUpdateRequest extends FormRequest
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
            'title' => 'required|max:255|min:5',
        ];
    }

    public function messeges()
    {
        return [
            'title.max' => 'Todo title is too long',
            'title.min' => 'Todo title is too short'
        ];
    }
}
