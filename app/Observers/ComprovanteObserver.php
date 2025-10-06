<?php

namespace App\Observers;

use App\Models\Comprovante;
use App\Models\Ponto;

class ComprovanteObserver
{
    /**
     * Handle the Comprovante "created" event.
     */
    public function created(Comprovante $comprovante): void
    {
        //
    }

    /**
     * Handle the Comprovante "updated" event.
     */

        public function updated(Comprovante $comprovante)
        {
            // verifica se o status mudou
            if ($comprovante->wasChanged('status') && $comprovante->status === 'aprovado') {

                // evita duplicar pontos se já tiver um registro
                if (!$comprovante->ponto) {
                    Ponto::create([
                        'user_id' => $comprovante->user_id,
                        'comprovante_id' => $comprovante->id,
                        'quantidade' => $comprovante->produto->pontuacao,
                    ]);
                }
            }
        }
    /**
     * Handle the Comprovante "deleted" event.
     */
    public function deleted(Comprovante $comprovante): void
    {
        //
    }

    /**
     * Handle the Comprovante "restored" event.
     */
    public function restored(Comprovante $comprovante): void
    {
        //
    }

    /**
     * Handle the Comprovante "force deleted" event.
     */
    public function forceDeleted(Comprovante $comprovante): void
    {
        //
    }
}
