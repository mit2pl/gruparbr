<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";

    protected $fillable = [
        'post_id',
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

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
