<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailRegistroConfirmacao extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $link = url('/api/auth/registro/ativar/' .
            $this->user->id . '/' .
            $this->user->token);

        return $this->view('emails.registroconfirmacao')->with([
            'name' => $this->user->name,
            'email' => $this->user->email,
            'datahora' => now()->setTimezone('America/Sao_Paulo')->format('d-m-Y H:i:s'),
            'link' => $link
        ])->attach(base_path() . '/arquivos/anexo.txt');
    }
}
