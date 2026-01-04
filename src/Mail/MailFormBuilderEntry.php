<?php

namespace RafyMora\FormbuilderField\Mail;

use Illuminate\Mail\Mailable;

class MailFormBuilderEntry extends Mailable
{
    /**
     * The order instance.
     */
    public $dataMail;
    public $view;
    /**
     * Create a new message instance.
     *
     * @param  $data
     * @return void
     */
    public function __construct(string $view, array $data)
    {
        $this->dataMail = $data;
        $this->view = $view;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('formbuilder-field.email.from'))
                    ->view($this->view);
    }
}
