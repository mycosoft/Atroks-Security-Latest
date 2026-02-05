<?php

namespace App\Mail;

use App\Models\SafeKeepingRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SafeKeepingReceipt extends Mailable
{
    use Queueable, SerializesModels;

    public $record;

    public $qrCode;

    /**
     * Create a new message instance.
     */
    public function __construct(SafeKeepingRecord $record)
    {
        $this->record = $record;

        // Generate QR Code
        $clientName = $record->client ? $record->client->name : 'No Client';
        $qrContent = 'Ref: '.$record->reference_number."\nClient: ".$clientName."\nItem: ".$record->item_description;
        $this->qrCode = QrCode::size(100)->generate($qrContent);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Safe Keeping Receipt - '.$this->record->reference_number,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.safe_keeping_receipt',
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
}
