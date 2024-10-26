<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'published_at'];

    //protected $table = 'articles'; Nombre por defecto de la tabla a buscar si la borro buscara Post en mayuscula y minuscula
    public function posts(): HasMany{
        return $this->HasMany(Post::class);
    }

}
