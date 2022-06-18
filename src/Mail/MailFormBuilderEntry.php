<?php

namespace RafyMora\FormbuilderField\Mail;

use Illuminate\Mail\Mailable;

class MailFormBuilderEntry extends Mailable
{
    /**
     * The order instance.
     */
    public $dataMail;
    /**
     * Create a new message instance.
     *
     * @param  $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->dataMail = $data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('formbuilder-field.email.from'))
                    ->view('rafy-mora.formbuilder-field::emails.entry_template');
    }
}
