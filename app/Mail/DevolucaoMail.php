<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Agendamento;
use Uspdev\Replicado\Pessoa;

class DevolucaoMail extends Mailable
{
    use Queueable, SerializesModels;
    private $agendamento;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Agendamento $agendamento)
    {   
        $this->agendamento = $agendamento;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Devolução de avaliação do trabalho acadêmico de {$this->agendamento->user->name}";
        $file = File::where('agendamento_id',$this->agendamento->id)->first();

        return $this->view('emails.devolver_avaliacao')
        ->to(Pessoa::emailusp($this->agendamento->user->codpes))
        ->subject($subject)
        ->attachFromStorage($file->path, $file->original_name, [
            'mime' => 'application/pdf',
        ])
        ->with([
            'agendamento' => $this->agendamento,
        ]);
    }
}
