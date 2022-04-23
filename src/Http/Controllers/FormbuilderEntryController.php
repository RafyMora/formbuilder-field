<?php

namespace RafyMora\FormbuilderField\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use RafyMora\FormbuilderField\Models\Formbuilder;
use RafyMora\FormbuilderField\Models\FormbuilderEntry;
use RafyMora\FormbuilderField\Http\Requests\FormbuilderEntryRequest;

class FormbuilderEntryController extends Controller
{
    /**
     * Show an entry.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // return view('user.profile', [
        //     'user' => User::findOrFail($id)
        // ]);
    }

    /**
     * Store a new entry.
     *
     * @param  Illuminate\Support\Facades\Redirect $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fbeRequest = new FormbuilderEntryRequest();
        $validator = Validator::make($request->all(), $fbeRequest->rules(), $fbeRequest->messages());
        
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $orginalForm = Formbuilder::where('uniq_id', $request->input('original-form'))->first();
        if (empty($orginalForm)) {
            return Redirect::back()->withErrors(['message' => __('rafy-mora.formbuilder-field::formbuilder.validations.form_not_found')])->withInput();
        }
        // Save entry in database
        if ($orginalForm->in_database) {

            $error = false;
            $fieldWithData = [];
            $fields = json_decode($orginalForm->form);
            foreach ($fields as $field) {
                // Escape no input form entry
                if(isset($field->name)) {
                    $field->userData = [$request->input($field->name)];
                    $fieldWithData[] = $field;
                }
            }
            if ($error === true) {
                // @TODO: This redirect it's for custom validation 
                return Redirect::back()->with(['dataError' => json_encode($fieldWithData)])->withInput();
            }
            $newForm = new FormbuilderEntry([
                'structure_form' => $orginalForm->form,
                'structure_result' => json_encode($fieldWithData),
                'fb_form_id' => $orginalForm->id,
            ]);
            $newForm->save();
        }
        // @TODO Send form by Mail
        if ($orginalForm->by_mail) {
            $mail_data = [];

        }
        return Redirect::back()->with(['success' => __('rafy-mora.formbuilder-field::formbuilder.validations.success_db')]);
    }
}
