<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'id_usuario',
        'id_categoria',
        'id_tema',
        'id_publicacion',
        'fecha_publicacion',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($comentario) {
            $comentario->fecha_publicacion = now();
        });
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'id_tema');
    }

    public function publicacion()
    {
        return $this->belongsTo(Publicaciones::class, 'id_publicacion');
    }
}
