<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonateRequest extends FormRequest
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
            'title'                 => 'required',
            'whom'                  => 'required',
            'what'                  => 'required',
            'for_what'              => 'required',
            'short_description'     => 'required',
            'author'                => 'required',
            'url'                   => 'required',
        ];
    }
}
