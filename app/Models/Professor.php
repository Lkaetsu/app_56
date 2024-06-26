<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Professor extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, fn($query,$search)=>
            $query
                ->where('name','like','%'.$search.'%')
                ->orwhere('RP','like','%'.$search.'%')
        );
    }
}