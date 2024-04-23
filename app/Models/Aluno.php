<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aluno extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query,$search)=>
            $query
                ->where('name','like','%'.$search.'%')
                ->orwhere('RA','like','%'.$search.'%')
        );
    }
/* 
    public function curso(): BelongsTo
{
    return $this->belongsTo(Curso::class, 'curso_id');
} */
}
