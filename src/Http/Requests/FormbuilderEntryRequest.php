<?php

namespace RafyMora\FormbuilderField\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Http\FormRequest;

class FormbuilderEntryRequest extends FormRequest
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
        return [
            'original-form' => 'required',
            '_token'        => 'required',
            'submit'        => 'required',
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
            // custom attribute
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return array_merge(__('validation'), [
            // custom message
        ]);
    }
}
