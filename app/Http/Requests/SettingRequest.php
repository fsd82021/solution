<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'logo' => 'nullable|image',
 
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required']];
            $rules += [$locale . '.description' => ['required']];
            $rules += [$locale . '.working_times' => ['required']];
            $rules += [$locale . '.copyrights' => ['required']];
            

        }
        return $rules;
    }
    public function messages()
    {
        $messages = [
            'logo.required' => trans('setting.logo_required'),
        ];
        foreach (config('translatable.locales') as $locale) {
            $messages += [$locale . '.name.required' => trans('setting.name_required_' . $locale)];
            $messages += [$locale . '.description.required' => trans('setting.desc_required_' . $locale)];
            $messages += [$locale . '.working_times.required' => trans('setting.working_times_required_' . $locale)];
            $messages += [$locale . '.copyrights.required' => trans('setting.copyrights_required_' . $locale)];
        }
        return $messages;
    }
}
