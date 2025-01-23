<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\EspecializacionController;
use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\HabilidadController;
use App\Http\Controllers\HechizoController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\ObjetoController;
use App\Http\Controllers\PersonajeController;
use App\Http\Controllers\ProfileController;
use App\Models\Habilidad;
use App\Models\Hechizo;
use App\Models\Libro;
use App\Models\Objeto;
use App\Models\Personaje;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {

    $ultimosLibros = Libro::orderBy('created_at', 'desc')->limit(5)->get();
    $ultimosHechizos = Hechizo::orderBy('created_at', 'desc')->limit(5)->get();
    $ultimosObjetos = Objeto::orderBy('created_at', 'desc')->limit(5)->get();
    $ultimasHabilidades = Habilidad::orderBy('created_at', 'desc')->limit(5)->get();
    $ultimosPersonajes = Personaje::orderBy('created_at', 'desc')->limit(5)->get();

    return view('dashboard', ['ultimosLibros' => $ultimosLibros, 'ultimosPersonajes' => $ultimosPersonajes, 'ultimosHechizos' => $ultimosHechizos, 'ultimosObjetos' => $ultimosObjetos, 'ultimasHabilidades' => $ultimasHabilidades]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('hechizos', HechizoController::class);
    Route::resource('libros', LibroController::class);
    Route::resource('objetos', ObjetoController::class);
    Route::resource('personajes', PersonajeController::class);
    Route::resource('comentarios', ComentarioController::class);
    Route::resource('familias', FamiliaController::class);
    Route::resource('especializaciones', EspecializacionController::class)->parameters(['especializaciones' => 'especializacion']);
    Route::get('/hechizos/{id}', [HechizoController::class, 'show'])->name('hechizos.show');
    Route::get('/libros/{id}', [LibroController::class, 'show'])->name('libros.show');
    Route::resource('habilidades', HabilidadController::class)->parameters([
        'habilidades' => 'habilidad',
    ]);

    Route::get('/personajes/{id}/informacion', [PersonajeController::class, 'informacion'])->name('personajes.informacion');
    Route::get('/cementerio', function () {
        $caidos = Personaje::onlyTrashed()->get();
        return view('personajes.cementerio', ['caidos' => $caidos]);
    })->middleware(['auth', 'verified'])->name('cementerio');

    Route::put('/resucitar/{id}', [PersonajeController::class, 'res'])->name('resucitar');
    Route::get('/personajes/editHabilidades/{personaje}', [PersonajeController::class, 'editHabilidades'])->name('personajes.editHabilidades');
    Route::put('/personajes/updateHabilidades/{personaje}', [PersonajeController::class, 'updateHabilidades'])->name('personajes.updateHabilidades');
    Route::put('/personajes/updateHabilidad/{personaje}', [PersonajeController::class, 'updateHabilidad'])->name('personajes.updateHabilidad');
    Route::put('/personajes/updateEspecializacion/{personaje}', [PersonajeController::class, 'updateEspecializacion'])->name('personajes.updateEspecializacion');
    Route::put('/personajes/especializacion/{personaje}', [PersonajeController::class, 'especializacion'])->name('personajes.especializacion');
    Route::put('/personajes/desespecializacion/{personaje}', [PersonajeController::class, 'desespecializacion'])->name('personajes.desespecializacion');

});

require __DIR__.'/auth.php';

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');




