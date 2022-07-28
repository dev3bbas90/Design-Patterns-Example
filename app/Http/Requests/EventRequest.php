<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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

        if($this->method() == "PUT") //update
        {
            $time_frame =request('hall_time_frame_id');
            $date =request('date');
            return [
                'program_id'            => 'required|integer',
                'theater_id'            => 'required|integer',
                'hall_id'               => 'required|numeric',
                'date'                  => 'required|date',
                'weekday_price'         => 'required|numeric',
                'weekend_price'         => 'required|numeric',
                'hall_time_frame_id' => [
                    'required',
                    Rule::unique('events')->where(function ($query) use($time_frame,$date,$id) {
                        $query->where('date', $date)->where('hall_time_frame_id', $time_frame)->where('id','!=',$id);
                    }),
                ],
            ];
        }
        if($this->method() =='POST')
        {
            return [
                'program_id'    => 'required|integer',
                'hall_id'       => 'required|numeric',
                'from_date'     => 'required|date|after_or_equal:now',
                'to_date'       => 'required|date|after_or_equal:from_date',
                'weekday_price' => 'required|numeric',
                'weekend_price' => 'required|numeric',
                'time_frames'   => 'required|array',
                'time_frames.*' => 'required|numeric',
            ];
        }
    }
    public function messages()
    {
        return [
            'hall_time_frame_id.unique'=>'there is A program in that show time',
        ];
    }
}
