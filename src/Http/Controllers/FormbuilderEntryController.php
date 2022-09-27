<?php

namespace RafyMora\FormbuilderField\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use RafyMora\FormbuilderField\Models\FormbuilderEntry;
use RafyMora\FormbuilderField\Mail\MailFormBuilderEntry;
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
        $orginalForm = config('formbuilder-field.model_form')::where('uniq_id', $request->input('original-form'))->first();
        if (empty($orginalForm)) {
            return Redirect::back()->withErrors(['message' => __('rafy-mora.formbuilder-field::formbuilder.validations.form_not_found')])->withInput();
        }
        // validate Google ReCaptcha V3
        if (!empty(config('formbuilder-field.captcha_v3_site_key')) && !empty(config('formbuilder-field.captcha_v3_secret_key')) && !empty($orginalForm->display_captcha) && $request->has('g-recaptcha-response')) {
            if(!$this->verifyReCaptcha($request->input('g-recaptcha-response'))) {
                return Redirect::back()->withErrors(['message' => __('rafy-mora.formbuilder-field::formbuilder.validations.captcha_invalid')])->withInput();
            }
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
                'structure_form'   => $orginalForm->form,
                'structure_result' => json_encode($fieldWithData),
                'fb_form_id'       => $orginalForm->id,
            ]);
            $newForm->save();
        }
        $data_admin = [];
        if ($orginalForm->copy_user) {
            $data_user  = [];
            $data_user['content_form'] = json_decode($newForm->structure_result);
            $data_user['form_entry']   = $newForm;
            $data_user['orginal_form'] = $orginalForm;
            $mail_to = collect($data_user['content_form'])->where('name', $orginalForm->field_mail_name)->first();
            
            if(empty($mail_to) || empty($mail_to->userData[0]) || (!empty($mail_to->userData[0]) && !filter_var($mail_to->userData[0], FILTER_VALIDATE_EMAIL))) {
                $data_admin['error_mail_user'] = __('rafy-mora.formbuilder-field::formbuilder.emails.error_mail_user');
            } else {
                Mail::to($mail_to->userData[0])->send(new MailFormBuilderEntry('rafy-mora.formbuilder-field::emails.user_template', $data_user));
                // return (new MailFormBuilderEntry('rafy-mora.formbuilder-field::emails.user_template', $data_user));
            }
        }
        if ($orginalForm->by_mail) {
            $data_admin['content_form'] = json_decode($newForm->structure_result);
            $data_admin['form_entry']   = $newForm;
            $data_admin['orginal_form'] = $orginalForm;
            $mail_to = (!empty($orginalForm->mail_to)) ? array_filter(explode(',', $orginalForm->mail_to)) : config('formbuilder-field.email.to');
            Mail::to($mail_to)->send(new MailFormBuilderEntry('rafy-mora.formbuilder-field::emails.entry_template', $data_admin));
            // return (new MailFormBuilderEntry('rafy-mora.formbuilder-field::emails.entry_template', $data_admin));
        }

        return Redirect::back()->with(['success' => __('rafy-mora.formbuilder-field::formbuilder.validations.success_db')]);
    }

    /**
     * Verify if tokken captcha are good by google
     * 
     * @param string $recaptchaCode the token in request input form
     * @return true/false
     */
    private function verifyReCaptcha(string $recaptchaCode){
        $postdata = http_build_query(["secret" => config('formbuilder-field.captcha_v3_secret_key'),"response" => $recaptchaCode]);
        $opts = ['http' =>
            [
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            ]
        ];
        $context = stream_context_create($opts);
        $result  = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
        $check   = json_decode($result);
        return $check->success;
    }
}
