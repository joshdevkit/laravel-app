<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewUserWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $plainTextPassword;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $plainTextPassword)
    {
        $this->user = $user;
        $this->plainTextPassword = $plainTextPassword;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New User Welcome Email',
        );
    }

    public function build()
    {
        return $this->subject('Welcome to Construction Management System')
            ->view('emails.new_user_welcome')
            ->with([
                'name' => $this->user->fullname,
                'email' => $this->user->email,
                'password' => $this->plainTextPassword,
                'loginLink' => 'http://localhost:8000/login',
            ]);
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
