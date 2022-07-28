<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HallTimeFrameRequest extends FormRequest
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
            'from'        => 'required|date_format:H:i',
            'to'          => 'required|date_format:H:i',
            'hall_id'     => 'required|integer'
        ];
    }
}
