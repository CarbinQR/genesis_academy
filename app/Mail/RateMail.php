<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RateMail extends Mailable
{
    use Queueable, SerializesModels;

    private int $rate;

    /**
     * Create a new message instance.
     */
    public function __construct(string $rate)
    {
        $this->rate = $rate;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rate Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.rate-mail',
            with: ['rate' => $this->rate]
        );
    }
}
