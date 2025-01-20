<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaccion extends Model
{
    use HasFactory;

    protected $table = 'reacciones';

    protected $fillable = [
         
         'nombre',
         'imagen'
        ];

    public function publicacion()
    {
        return $this->belongsToMany(Publicaciones::class, 'publicacion_reaccion')->withPivot('user_id')->withTimestamps();
    }

    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'publicacion_reaccion', 'reaccion_id', 'user_id');
    }
   
}
