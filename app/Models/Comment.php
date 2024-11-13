<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id', 'id');
    } //Yo creo que esto sirve para ver desde un post el usuario que tiene

    public function posts(): BelongsTo{
        return $this->belongsTo(Category::class, 'posts_id', 'id');
    }
}
