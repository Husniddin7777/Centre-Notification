<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNotification extends Mailable
{
    use Queueable, SerializesModels;

    public string $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message) {
        $this->body = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $body = $this->body;

        return $this->subject('Message')
            ->view('notification', compact('body'));

    }
}
