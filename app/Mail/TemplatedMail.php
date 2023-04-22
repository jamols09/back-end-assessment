<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TemplatedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public string $message;
    public string $title;
    public string $filename;

    public function __construct(string $message, string $title = 'Templated Mail', string $filename)
    {
        $this->message = $message;
        $this->title = $title;
        $this->filename = $filename;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->title,
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.mail-message',
            with: [
                'body' => $this->message,
                'title' => $this->title
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return array_filter([
            $this->filename ? Attachment::fromStorage('attachment/Zlgdw7lujVhRPxTX9Nxuv8KZDeY3p1UXbPOvsrH6.png')->as($this->filename) : null
        ]);
    }
}
