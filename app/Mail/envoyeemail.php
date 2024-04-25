<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class envoyeemail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $motDePasse;

    public function __construct($email, $motDePasse)
    {
        $this->email = $email;
        $this->motDePasse = $motDePasse;
    }

    public function build()
    {
        return $this->view('Mail.envoyeemail')
                    ->subject('Nouveau sous-administrateur')
                    ->with([
                        'email' => $this->email,
                        'motDePasse' => $this->motDePasse,
                    ]);
    }
}
