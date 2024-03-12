<?php

namespace App\Http\Requests;

use App\Rules\CheckIfExistsInCheckin;
use Illuminate\Foundation\Http\FormRequest;

class FastEventCheckinRequest extends FormRequest
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
            'user'  => ['required', new CheckIfExistsInCheckin($this->user, $this->fast_event_id)]
        ];
    }
}
