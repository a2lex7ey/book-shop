<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'biography',
    ];
    public function books(): HasMany // связь один ко многим.
    {
        return $this->hasMany(Book::class);
    }
}
