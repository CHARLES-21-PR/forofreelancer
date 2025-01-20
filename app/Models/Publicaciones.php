<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
class Publicaciones extends Model
{
    use HasFactory;

    protected $table = 'publicaciones';

    protected $fillable = [
        'id_tema',
        'id_usuario',
        'contenido',
        'imagen',
        'fecha_creacion',
    ];

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'id_tema', 'id');
    }
    public function usuario()
    {
        return $this->belongsTo(usuarios::class, 'id_usuario', 'id');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($publicacion) {
            $publicacion->comentarios()->delete();
            $publicacion->reacciones()->detach();
        });
    }
    public function comentarios()
    {
        return $this->hasMany(Comentarios::class, 'id_publicacion');
    }

    public function reacciones()
    {
        return $this->belongsToMany(Reaccion::class, 'publicacion_reaccion', 'publicacion_id', 'reaccion_id');
    }

    public function reaccionesCount()
    {
        return $this->reacciones()
                    ->select('reacciones.id', 'reacciones.nombre', 'reacciones.imagen', DB::raw('count(publicacion_reaccion.reaccion_id) as total'))
                    
                    
                    ->groupBy('reacciones.id', 'reacciones.nombre', 'reacciones.imagen', 'publicacion_reaccion.publicacion_id', 'publicacion_reaccion.reaccion_id');
    }

    public function usuariosReaccion($publicacionId, $reaccionId)
    {
        return User::select('users.id', 'users.name')
        ->join('publicacion_reaccion', 'users.id', '=', 'publicacion_reaccion.user_id')
        ->where('publicacion_reaccion.publicacion_id', $publicacionId)
        ->where('publicacion_reaccion.reaccion_id', $reaccionId)
        ->get();
    }
}
