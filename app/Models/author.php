<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class author extends Model
{
    use HasFactory;

    protected $fillable  = [
        'author_name',
        'tempat_lahir'
    ];

    public function book(): HasMany
    {
        return $this->HasMany(author::class);
    }
}
