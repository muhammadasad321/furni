<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $verificationToken;

    public function __construct($verificationToken)
    {
        $this->verificationToken = $verificationToken;
    }

    public function build()
    {
        return $this->subject('Email Verification')->markdown('emails.verification_email');
    }
}
