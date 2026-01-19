<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
class Post extends Model
{
    use HasFactory;

   protected $fillable = [
        'titulo',
        'contenido',
        'usuario_id', 
    ];
public function usuario()
{
    return $this->belongsTo(Usuario::class, 'usuario_id');
}

}


