<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountDeleteRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $accountDeleteUrl;
    public $salesEmployee;

    /**
     * Create a new message instance.
     */
    public function __construct($customer, $accountDeleteUrl, $salesEmployee)
    {
        $this->customer = $customer;
        $this->accountDeleteUrl = $accountDeleteUrl;
        $this->salesEmployee = $salesEmployee;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Account Delete Request',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.account-delete-request', // Pas de weergavenaam hier aan
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->view('mails.account-delete-request');
    }
}
