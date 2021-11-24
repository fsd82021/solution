<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
        $image = request()->isMethod('put') ? 'nullable|max:8000' : 'required|max:8000';

        $rules = [
            'logo' =>  $image ,
        ];

        return  $rules;
    }
    public function messages()
    {
        $messages = [
            'logo.required' => trans('partner.logo_required'),
        ];
        return $messages;
    }
}
