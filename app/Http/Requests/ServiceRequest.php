<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'icon' => 'nullable',
           


        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required']];
          
            $rules += [$locale . '.description' => ['required']];
 
            

        }
        return $rules;
    }
    public function messages()
    {
        $messages = [
            'logo.required' => trans('package.logo_required'),
            'icon.required' => trans('package.icon_required'),
       

        ];
        foreach (config('translatable.locales') as $locale) {
            $messages += [$locale . '.name.required' => trans('package.name_required_' . $locale)];
            $messages += [$locale . '.description.required' => trans('package.desc_required_' . $locale)];
             
        }
        return $messages;
    }
}
