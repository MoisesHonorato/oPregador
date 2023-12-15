<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esboco extends Model
{
    use HasFactory;

    protected $fillable = ['livro_id', 'categoria_id', 'titulo', 'texto', 'capitulo', 'versiculo'];

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function sermons()
    {
        return $this->hasMany(Sermon::class);
    }
}
