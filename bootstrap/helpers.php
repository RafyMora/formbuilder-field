<?php

if (! function_exists('renderForm')) {
    function renderForm($id)
    {
        $form = \RafyMora\FormbuilderField\Models\Formbuilder::find($id);
        $formData = (!empty($form->form)) ? $form->form : json_encode([]);
        return view('rafy-mora.formbuilder-field::render_form', ['data' => $formData, 'form' => $form]);
    }
}
