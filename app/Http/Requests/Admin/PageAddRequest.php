<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'category'=>['required','numeric'],
          'sub_category'=>['required','numeric'],
          'name'=>['required'],
          'image' => ['required_without:id|array'],
          'image.*' => ['required_without:id|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
          'short_description'=>['required'],
        ];
    }
}
