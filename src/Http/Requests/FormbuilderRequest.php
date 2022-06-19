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
            'title'       => 'required|min:3|max:255',
            'intro'       => 'nullable',
            'form'        => 'required',
            'text_button' => 'required|min:1|max:255',
            'mail_to'     => 'required_if:by_mail,1|max:255',
            'field_mail_name'     => 'required_if:copy_user,1|max:255',
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
            'title'       => __('rafy-mora.formbuilder-field::formbuilder.labels.title'),
            'intro'       => __('rafy-mora.formbuilder-field::formbuilder.labels.intro'),
            'form'        => __('rafy-mora.formbuilder-field::formbuilder.labels.form'),
            'text_button' => __('rafy-mora.formbuilder-field::formbuilder.labels.text_button'),
            'mail_to'     => __('rafy-mora.formbuilder-field::formbuilder.labels.mail_to'),
            'by_mail'     => __('rafy-mora.formbuilder-field::formbuilder.labels.by_mail'),
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
            'mail_to.required_if'         => __('rafy-mora.formbuilder-field::formbuilder.validations.mail_to'),
            'field_mail_name.required_if' => __('rafy-mora.formbuilder-field::formbuilder.validations.field_mail_name'),
        ];
    }
}
