<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class EmailTwoFactorCode extends Mailable
{
    public $code;
    public function __construct($code)
    {
        $this->code = $code;
    }
    public function build()
    {
        return $this->subject('Je inlogcode')->view('emails.email-two-factor-code');
    }
}
