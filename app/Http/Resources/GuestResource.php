<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestResource extends JsonResource
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
            'email' => $this->email,
            'telefone' => $this->telefone,
            'data_da_visita' => $this->data_da_visita,
            'recebeu_jesus' => $this->recebeu_jesus,
            'reconciliacao' => $this->reconciliacao,
            'responsavel' => $this->responsavel,
            'observacoes' => $this->observacoes,
            'data_de_nascimento' => $this->data_de_nascimento,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'referencia' => $this->referencia,
            'cep' => $this->cep,
            'created' => Carbon::make($this->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
