<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $data = $this->data;
        $address = env('MAIL_FROM_ADDRESS', 'write@ucap.com');
        $app_name = ucap_get('app_name') ?? 'UCAP';
        $subject = 'Contact mail from '.$app_name.' page';
        $name = env('APP_NAME', $app_name);

        return $this->view('mails.contact', compact(['data']))
            ->from($address, $name)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject);
    }
}
