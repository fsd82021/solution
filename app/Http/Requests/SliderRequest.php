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
        $rules = [
            'image.*' => 'nullable',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', 'string']];
            $rules += [$locale . '.description' => ['required']];
        }
        return  $rules;
    }
    public function messages()
    {
        $messages = [
            'image.required' => trans('slider.image_required'),
        ];
        foreach (config('translatable.locales') as $locale) {
            $messages += [$locale . '.name.required' => trans('slider.name_required_' . $locale)];
            $messages += [$locale . '.description.required' => trans('slider.desc_required_' . $locale)];
        }
        return $messages;
    }
}
