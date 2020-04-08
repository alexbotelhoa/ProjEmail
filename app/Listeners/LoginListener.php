<?php

namespace App\Listeners;

use App\Mail\NovoAcesso;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Redis;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        info("Logou nessa porra!!!");
        info($event->user->name);
        info($event->user->email);

        info("antes ''.'' ");

        $user = new NovoAcesso($event->user);
        $tempo = now()->addMinutes(2);

        Mail::to($event->user)
            //->send($user); //Espera o envio para continuar
            ->queue($user); //Segue o fluxo sem esperar o envio
            //->later($tempo, $user); //Espera terminar o TEMPO para continuar

        info("depois ..'.. ");
    }
}
