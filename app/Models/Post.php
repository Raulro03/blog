<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;



    //protected $table = 'articles'; Nombre por defecto de la tabla a buscar si la borro buscara Post en mayuscula y minuscula
}
