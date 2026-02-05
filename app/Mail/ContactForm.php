<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            to: 'info@atroksservices.com',
            subject: 'Contact Form: '.($this->data['subject'] ?? 'New Message'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_form',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
