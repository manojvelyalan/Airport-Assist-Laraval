<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $request;
    public function __construct($request)
    {
        $this->request = $request;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.main.contact')
        ->with(['request' => $this->request])
        ->from(['address' => $this->request->email, 'name' => ucwords($this->request->fullName)])
        ->replyTo(['address' => $this->request->email])
        ->subject(ucwords($this->request->subject));

    }
}
