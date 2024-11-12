<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id' , 'category_id' ,'published_at'];

    //protected $table = 'articles'; Nombre por defecto de la tabla a buscar si la borro buscara Post en mayuscula y minuscula

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id', 'id');
    } //Yo creo que esto sirve para ver desde un post el usuario que tiene

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
