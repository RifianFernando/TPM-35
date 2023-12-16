<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $table = 'book';

    protected $fillable  = [
        'book_name',
        'author_id',
        'book_image_path'
    ];


    public function author(): BelongsTo
    {
        return $this->belongsTo(author::class);
    }
}
