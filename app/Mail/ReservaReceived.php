<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservaReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $reserva;
    public $adultos;
    public $infantes;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reserva)
    {
        $this->reserva = $reserva;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->adultos = 0;
        foreach ($this->reserva->adultos as $pax) {
            $this->adultos += $pax;
        }

        $this->infantes = 0;
        foreach ($this->reserva->infantes as $pax) {
            $this->infantes += $pax;
        }
        return $this->subject('Confirmacion de Reserva')->view('Mails.es.reserva');
    }
}
