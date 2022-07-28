<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $id= request('id') ?: null;
        return [
            'name'        => 'required|string|max:255|unique:categories,name,'.$id,
            'price_raise' => 'required|numeric',
            'color'       => 'required|unique:categories,color,'.$id,
            'code'        => 'required|max:1|min:1|unique:categories,code,'.$id,
        ];
    }
}
