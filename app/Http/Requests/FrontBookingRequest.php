<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrontBookingRequest extends FormRequest
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
            'theater' => 'required|exists:theaters,id',
            'date'    => 'required|date',
            'time'    => 'required|integer|exists:hall_time_frames,id',
            'program' => 'required|integer|exists:programs,id'
        ];
    }
}
