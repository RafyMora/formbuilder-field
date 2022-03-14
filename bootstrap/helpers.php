<?php

if (! function_exists('renderFormBuilder')) {
    function renderFormBuilder($uuid)
    {
        $form = \RafyMora\FormbuilderField\Models\Formbuilder::where('uniq_id', $uuid)->firstOrNew();
        if (empty($form) || !isset($form->uniq_id) || empty($form->uniq_id)) {
            return view('rafy-mora.formbuilder-field::render_form', ['data' => json_encode([]), 'form' => new \RafyMora\FormbuilderField\Models\Formbuilder()]);
        }
        $formData = (!empty($form->form)) ? $form->form : json_encode([]);
        return view('rafy-mora.formbuilder-field::render_form', ['data' => $formData, 'form' => $form]);
    }
}
