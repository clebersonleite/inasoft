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
            'tipo' => $this->tipo,
            'anfitriao' => $this->anfitriao,
            'data_de_abertura' => $this->data_de_abertura,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'referencia' => $this->referencia,
            'cep' => $this->cep,
            'fkCodChurch' => $this->fkCodChurch,
            'fkCodLider' => $this->fkCodLider,
            'fkCodLider2' => $this->fkCodLider2,
            'created' => Carbon::make($this->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
