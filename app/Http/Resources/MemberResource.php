<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
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
            'data_de_nascimento' => $this->data_de_nascimento,
            'logradouro' => $this->logradouro,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'referencia' => $this->referencia,
            'cep' => $this->cep,
            'estado_civil' => $this->estado_civil,
            'genero' => $this->genero,
            'batizado' => $this->batizado,
            'fkCodDepartment' => $this->fkCodDepartment,
            'fkCodCell' => $this->fkCodCell,
            'fkCodChurch' => $this->fkCodChurch,
            'church' => new ChurchResource($this->whenLoaded('church')),
            'created' => Carbon::make($this->created_at)->format('Y-m-d H:i:s')
        ];
    }
}
