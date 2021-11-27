<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messages;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $messages)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messages = $messages;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.emails.contact');
    }
}
