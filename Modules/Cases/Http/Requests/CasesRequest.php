<?php

namespace Modules\Cases\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CasesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $rules += [
            'category_id'=>'required',
            'case_name' => 'required',
            'description' => 'required',
            'defence_by'=>'required',
            'crime'=>'required',
            'criminal_name'=>'required',

        ];
        if (request()->image) {
            $rules += [
                'image' => 'required',
                'image.*' => 'mimes:jpeg,png,jpg,gif,svg,bmp,tif,tiff,eps,webp'
            ];
        }

        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
