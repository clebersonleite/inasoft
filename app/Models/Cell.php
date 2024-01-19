<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cell extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'tipo',
        'anfitriao',
        'data_de_abertura',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'referencia',
        'cep',
        'fkCodChurch',
        'fkCodLider',
        'fkCodLider2'
    ];

    public function church()
    {
        return $this->belongsTo(Church::class, 'fkCodChurch', 'id');
    }

    public function lider()
    {
        return $this->belongsTo(Member::class, 'fkCodLider', 'id');
    }

    public function lider2()
    {
        return $this->belongsTo(Member::class, 'fkCodLider2', 'id');
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
