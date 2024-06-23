<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imoveis extends Model
{
    use HasFactory;
    //definindo colunas 
    protected $fillable = [
        'nome',
        'cpf',
        'creci'
    ];
}
