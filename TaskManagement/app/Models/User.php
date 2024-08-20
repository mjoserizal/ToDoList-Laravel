<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        // 'password', jika tidak diperlukan pada model ini
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
