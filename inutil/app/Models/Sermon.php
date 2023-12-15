<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    use HasFactory;

    protected $fillable = ['esboco_id', 'usuario_id', 'imagem', 'local_sermon', 'data_sermon', 'observacao'];

    public function esboco()
    {
        return $this->belongsTo(Esboco::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
