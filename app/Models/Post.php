<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    protected $fillable = [
        'title',
        'content',
        'author',
    ];

    protected $casts = [
        'created_at'=>'datetime:d/m/Y H:i:s',
        'updated_at'=>'datetime:d/m/Y H:i:s'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }
    public function comments(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'id', 'post_id');
    }
}
