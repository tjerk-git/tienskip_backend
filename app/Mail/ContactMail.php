<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public function __construct(array $mailData)
    {
        //dd($mailData);
        $this->name = $mailData['name'];
        $this->email = $mailData['email'];
        $this->company = $mailData['company'];
        $this->phone = $mailData['phone'];
        $this->body = $mailData['message'];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('info@tienskip.nl', 'Tienskip'),
            subject: 'Contact formulier ingevuld',
            replyTo: [
                new Address($this->email, $this->name),
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
            with: [
                'name' => $this->name,
                'company' => $this->company,
                'email' => $this->email,
                'phone' => $this->phone,
                'body' => $this->body
            ],
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
