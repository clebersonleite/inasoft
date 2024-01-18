<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Guest extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'data_da_visita',
        'recebeu_jesus',
        'reconciliacao',
        'responsavel',
        'observacoes',
        'data_de_nascimento',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'referencia',
        'cep',
        'fkCodChurch'
    ];

    public function church()
    {
        return $this->belongsTo(Church::class, 'fkCodChurch', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
}
