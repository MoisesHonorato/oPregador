<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLevel extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_access_level');
    }
}
