<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Church extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'pastor_presidente',
        'logo',
        'whatsapp',
        'email',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'referencia',
        'cep',
    ];
}
