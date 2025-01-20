<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nombre_categoria',
        'descripcion',
    ];

    public function temas()
    {
        return $this->hasMany(Tema::class, 'id_categoria');
    }
    public function comentarios()
    {
        return $this->hasMany(Comentarios::class, 'id_categoria');
    }
}
