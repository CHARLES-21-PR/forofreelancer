<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ForoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\TemasController;
use App\Http\Controllers\ComentariosController;
use App\Http\Controllers\ReaccionController;
use App\Http\Controllers\NoticiasController;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ToolsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.update-photo');
});

require __DIR__.'/auth.php';

Route::controller(AuthController::class)->group(function () {
    Route::get('/google-auth/redirect', [AuthController::class, 'googleLogin']);
    Route::get('/google-auth/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');
});

//FORO
Route::middleware('auth')->group(function (){
    
//CATEGORIAS
Route::get('/foro/categoria/tareas', [ForoController::class, 'tareas'])->name('foro.tareas');
Route::get('/categoria/confesiones', [TemasController::class, 'confesiones'])->name('confesiones');

//PAG CUZILATADA
Route::get('/temas/cuzilatada/{id_tema}', [PublicacionController::class, 'pagCuzi'])->name('pag.cuzi');




//VIEW ASIGNATURAS
Route::get('/foro', [ForoController::class, 'index'])->name("foro");
Route::get('/foro/{curso}', [ForoController::class, 'curso'])->name("foro.curso");


//VIEW NOTICIAS
Route::get('/noticias/listar', [Noticiacontroller::class, 'view']) ->name("noticias");

//VIEW TOOLS
Route::get('/tools', [ToolsController::class, 'index'])->name('tools');
Route::get('/tools/calculadora', [ToolsController::class, 'calculadora'])->name('calculadora');
Route::get('/tools/calculador-promedio', [ToolsController::class, 'promedio'])->name('promedio');
Route::get('/tools/help-pages', [ToolsController::class, 'pages'])->name('pages');


Route::get('/dashboard', [foroController::class, 'inicio'])->name('dashboard');
});

Route::middleware(['can:manage users'])->group(function () {
    Route::post('/assign-role/{userId}', [UserController::class, 'assignRole'])->name('assign.role');
    Route::get('/assign-role-form/{userId}', [UserController::class, 'showAssignRoleForm'])->name('assign.role.form');
    Route::get('/show-roles', [UserController::class, 'showRoles'])->name('show.roles');
    Route::delete('/delete-post/{postId}', [PublicacionController::class, 'eliminarPost'])->name('delete.post');
    
});

Route::middleware(['can:view cruds'])->group(function () {
    //CRUDS
    //Crud usuarios
route::get('/crud', [UserController::class, 'index'])->name('crud');
route::get('/crud-usuarios', [UserController::class, 'usuarios'])->name('crud.usuarios');
route::get('/crud-show/{id}', [UserController::class, 'show'])->name('show');
    
    //crud categorias
Route::get('/categoria/listar', [CategoriaController::class, 'listar'])->name('listar.categoria');
Route::get('/categoria/registrar', [CategoriaController::class, 'registrar'])->name('registrar.categoria');
Route::post('/categoria/insertar', [CategoriaController::class, 'insertar'])->name('insertar.categoria');
Route::get('/categoria/detalle/{id}', [CategoriaController::class, 'detalle'])->name('detalle.categoria');
Route::get('/categoria/editar/{id}', [CategoriaController::class, 'editar'])->name('editar.categoria');
Route::put('/categoria/actualizar/{id}', [CategoriaController::class, 'actualizar'])->name('actualizar.categoria');
Route::delete('/categoria/eliminar/{id}', [CategoriaController::class, 'eliminar'])->name('eliminar.categoria');

//crud temas
Route::get('/temas/listar', [TemasController::class, 'listar'])->name('listar.tema');
Route::get('/temas/registrar', [TemasController::class, 'registrar'])->name('registrar.tema');
Route::post('/temas/insertar', [TemasController::class, 'insertar'])->name('insertar.tema');
Route::get('/temas/detalle/{id}', [TemasController::class, 'detalle'])->name('detalle.tema');
Route::get('/temas/editar/{id}', [TemasController::class, 'editar'])->name('editar.tema');
Route::put('/temas/actualizar/{id}', [TemasController::class, 'actualizar'])->name('actualizar.tema');
Route::delete('/temas/eliminar/{id}', [TemasController::class, 'eliminar'])->name('eliminar.tema');

//crud publicaión
Route::get('/publicacion/listar', [PublicacionController::class, 'listar'])->name('listar.publi');
Route::get('/publicacion/registrar', [PublicacionController::class, 'registrar'])->name('registrar.publi');
Route::post('/publicacion/insertar', [PublicacionController::class, 'insertar'])->name('insertar.publi');
Route::get('/publicacion/detalle/{id}', [PublicacionController::class, 'detalle'])->name('detalle.publi');
Route::get('/publicacion/editar/{id}', [PublicacionController::class, 'editar'])->name('editar.publi');
Route::put('/publicacion/actualizar/{id}', [PublicacionController::class, 'actualizar'])->name('actualizar.publi');
Route::delete('/publicacion/eliminar/{id}', [PublicacionController::class, 'eliminar'])->name('eliminar.publi');

//crud NOTICIAS
Route::post('/noticias/store', [NoticiaController::class, 'store'])->name('noticias.store');
Route::delete('/noticias/{noticia}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');
Route::get('/noticias', [Noticiacontroller::class, 'index']) ->name("listar.noticia");
});

Route::middleware(('auth'))->group(function () {
    Route::middleware(['can:create posts'])->group(function () {
        Route::get('/temas/cuzilatada/publicar/{id_tema}', [PublicacionController::class, 'publicar'])->name('publicar.post');
        Route::post('/temas/cuzilatada/publicaciones', [PublicacionController::class, 'insertarPubli'])->name('insertar.post');
        
        });
        
        Route::middleware(['can:create comments'])->group(function () {
           //COMENTARIOS
        Route::post('/temas/cuzilatada/comentarios', [ComentariosController::class, 'store'])->name('comentarios.store');
        
        });
        
        Route::middleware(['can:delete posts'])->group(function () {
            
            Route::delete('/temas/cuzilatada/eliminar/{id}', [PublicacionController::class, 'eliminarPost'])->name('eliminar.post');
         });
        
         Route::middleware(['can:delete comments'])->group(function () {
            Route::delete('/temas/cuzilatada/comentarios/{id}', [ComentariosController::class, 'destroy'])->name('comentarios.destroy');
            
         });
         Route::middleware(['can:react post'])->group(function () {
            Route::post('/reaccionar', [ReaccionController::class, 'react'])->name('reacciones.react');
            
         });

         Route::get('/reaccion/listar', [ReaccionController::class, 'index'])->name('listar.reacciones'); 
         Route::get('/reaccion/registrar', [ReaccionController::class, 'registrar'])->name('registrar.reacciones');
         Route::put('/reaccion/actualizar/{id}', [ReaccionController::class, 'actualizar'])->name('actualizar.reacciones');
         Route::get('/reaccion/editar/{id}', [ReaccionController::class, 'editar'])->name('editar.reacciones');
         Route::delete('/reaccion/eliminar/{id}', [ReaccionController::class, 'eliminar'])->name('eliminar.reacciones');        
         Route::post('/temas/cuzilatada/reacciones', [ReaccionController::class, 'store'])->name('reacciones.store');
         
});