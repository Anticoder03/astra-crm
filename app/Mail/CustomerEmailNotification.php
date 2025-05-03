<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    protected $emailSubject;
    protected $emailMessage;

    public function __construct($customer, $subject, $message)
    {
        $this->customer = $customer;
        $this->emailSubject = $subject;
        $this->emailMessage = $message;
    }

    public function build()
    {
        return $this->subject($this->emailSubject)
                    ->view('emails.crm_notification') // Assuming your view is named 'crm_notification'
                    ->with([
                        'customerName' => $this->customer->name,
                        'message' => $this->emailMessage,
                    ]);
    }
}

