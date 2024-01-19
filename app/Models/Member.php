<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Model
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
        'data_de_nascimento',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'referencia',
        'cep',
        'estado_civil',
        'genero',
        'batizado',
        'fkCodDepartment',
        'fkCodCell',
        'fkCodChurch'
    ];

    public function church()
    {
        return $this->belongsTo(Church::class, 'fkCodChurch', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'fkCodDepartment', 'id');
    }

    public function cell()
    {
        return $this->belongsTo(Cell::class, 'fkCodCel', 'id');
    }
}
