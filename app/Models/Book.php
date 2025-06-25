<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
      'title',
      'cover',
      'description',
      'publication_year',
      'genre_id',
      'price',
      'price',
      'count',
    ];
    protected $casts = [
      'publication_year' => 'date:Y',
    ];

    public function author(): BelongsTo // связываем книгу с автором, Многие ко одному.
    {
        return $this->belongsTo(Author::class);
    }
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}
