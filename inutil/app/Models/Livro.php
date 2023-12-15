<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = ['livro', 'qtdCapitulo'];

    public function esbocos()
    {
        return $this->hasMany(Esboço::class);
    }
}
