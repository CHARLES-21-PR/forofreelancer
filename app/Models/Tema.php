<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tema extends Model
{
    use HasFactory;

    protected $table = 'tema';

    protected $fillable = [
        'titulo',
        'id_categoria',
        'usuario_id',
        'fecha_de_creacion',
        'imagen',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function usuario()
    {
        return $this->belongsTo(usuarios::class, 'usuario_id');
    }

    function publicaciones()
    {
        return $this->hasMany(Publicaciones::class, 'id_tema', 'id');
    }
    public function comentarios()
    {
        return $this->hasMany(Comentarios::class, 'id_tema');
    }
}
