<?php

namespace RafyMora\FormbuilderField\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormbuilderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:255',
            'intro' => 'nullable',
            'form'  => 'required',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => __('rafy-mora.formbuilder-field::formbuilder.labels.title'),
            'intro' => __('rafy-mora.formbuilder-field::formbuilder.labels.intro'),
            'form'  => __('rafy-mora.formbuilder-field::formbuilder.labels.form'),
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
