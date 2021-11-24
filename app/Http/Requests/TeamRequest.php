<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'image' => 'nullable|image',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required', 'string']];
            $rules += [$locale . '.title' => ['required']];
        }
        return  $rules;
    }
    public function messages()
    {
        $messages = [
            'image.required' => trans('team.image_required'),
        ];
        foreach (config('translatable.locales') as $locale) {
            $messages += [$locale . '.name.required' => trans('team.name_required_' . $locale)];
            $messages += [$locale . '.title.required' => trans('team.title_required_' . $locale)];
        }
        return $messages;
    }
}
