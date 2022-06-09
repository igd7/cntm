<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'link'          => ['required', 'url', 'max:255'],
            'redirects_max' => ['required', 'numeric', 'min:0', 'max:100000'],
            'hours_max'     => ['required', 'numeric', 'min:1', 'max:24'],
        ];
    }
}
