<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'name'=>'required|string',
            'email' => 'required|email',
            'event_id' => 'required',
            'phone' =>'required|numeric',
            'seats' => 'required|array|min:1',
            'keys'  => 'required|array|min:1'
        ];
    }
}
