<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CellResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'tipo' => $this->email,
            'anfitriao' => $this->telefone,
            'data_de_abertura' => $this->data_da_visita,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'referencia' => $this->referencia,
            'cep' => $this->cep,
            'fkCodChurch' => $this->fkCodChurch,
            'fkCodLider' => $this->fkCodChurch,
            'fkCodLider2' => $this->fkCodChurch,
            'created' => Carbon::make($this->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
