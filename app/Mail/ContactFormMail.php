<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->name = $data['form-name'];
        $this->email = $data['form-mail'];
    }

    public function build()
    {
        return $this->from(config('mail.from.address'))
            ->replyTo($this->email)
            ->subject('New form submission from: ' . $this->name)
            ->view('emails.contact-form')
            ->with('data', $this->data);
    }
}