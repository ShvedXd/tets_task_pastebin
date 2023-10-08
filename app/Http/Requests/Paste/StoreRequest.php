<?php

namespace App\Http\Requests\Paste;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'title' => 'required|string',
            'content' => 'required|string',
            'delete_time' => 'required',
            'url_selector' => '',
            'highlight' => '',
            'access_type' => 'required|string',
            'user_id' => ''

        ];
    }
}
