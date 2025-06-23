<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
