<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddDoctorRequest extends FormRequest
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
            'name'=>'required',
            'degree'=>'required',
            'experience'=>'required|numeric',
            'ckone'=>'required',
            'fee_check'=>'in:Y',
            'consultation_fee'=>'required_if:fee_check,Y',
            'address_check'=>'in:Y',
            'location'=>'required_if:address_check,Y',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'speciality_id'=>'required|array',
            'speciality_id.*'=>'numeric',
            'title'=>'required_if:review_check,Y|array',
            'review_desc' =>'required_if:review_check,Y|array',
            'review_image'=>'required_if:review_check,Y|array',
            'review_image.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            //
        ];
    }
}
