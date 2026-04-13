<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReplyTestimonialMail extends Mailable
{
    use Queueable, SerializesModels;

    public $replyMessage;
    public $testimonial;

    /**
     * Create a new message instance.
     */
    public function __construct($replyMessage, $testimonial)
    {
        $this->replyMessage = $replyMessage;
        $this->testimonial = $testimonial;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Balasan untuk Ulasan Anda - Al-Khairat Tour & Travel',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reply_testimonial',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
