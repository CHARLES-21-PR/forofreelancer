<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Usuarios extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $table = 'users';

    
    protected $fillable = [
        'name',
        'email',
        'usuario',
        'contrasena',
        'google_id',
        'photo',
    ];

    
    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    // Atributos que deben ser convertidos a tipos nativos
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::created(function ($user) {
            $user->assignRole('usuario');
        });
    }

    // Método para obtener el identificador de autenticación
    public function getAuthIdentifierName()
    {
        return 'correo';
    }

    // Método para obtener la contraseña del usuario
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
    public $timestamps = true;

    
    
}
