<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{


    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
