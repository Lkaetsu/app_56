<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Professor extends Model
{
    use HasFactory;
}

class Professor extends Model
{

    public function materia(): HasMany
    {
        return $this->hasMany(Materia::class,'professor_materia');
    }
}
