<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Crews extends Authenticatable
{
    use HasFactory;

    protected $fillable = 
    [
        'id_crew',
        'password',
        'nama',
        'kategori',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
    
}
