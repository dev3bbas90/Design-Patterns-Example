<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            //
            'title'        => 'required|string|max:255',
            'short_title'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'sometimes|image',
            'alt'        => 'string',
        ];
    }
}
