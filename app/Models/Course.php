<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    use HasFactory;

    const PAGINATE = 10;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'price',
        'level',
        'status',
        'thumbnail',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
