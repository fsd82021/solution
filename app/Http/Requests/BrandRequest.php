<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'image' =>  $image ,
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', 'string']];
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'image.required' => trans('partner.logo_required'),
        ];
        foreach (config('translatable.locales') as $locale) {
            $messages += [$locale . '.name.required' => trans('slider.name_required_' . $locale)];
        }
        return $messages;
    }
}
