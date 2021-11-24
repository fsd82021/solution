<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatisticRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        $rules = [
            'icon' => 'nullable',
            'counter' => 'nullable',

        ];
        foreach (config('translatable.locales') as $locale) {
            $rules += [$locale . '.name' => ['required']];
        }
        return $rules;
    }
    public function messages()
    {
        $messages = [
            'icon.required' => trans('statistic.icon_required'),
            'counter.required' => trans('statistic.counter_required'),

        ];
        foreach (config('translatable.locales') as $locale) {
            $messages += [$locale . '.name.required' => trans('statistic.name_required_' . $locale)];
        }
        return $messages;
    }
}
