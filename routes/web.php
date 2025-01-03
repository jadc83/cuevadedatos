<?php
use App\Http\Controllers\HechizoController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\ObjetoController;
use App\Http\Controllers\ProfileController;
use App\Models\Hechizo;
use App\Models\Libro;
use App\Models\Objeto;
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
    return view('dashboard', ['ultimosLibros' => $ultimosLibros, 'ultimosHechizos' => $ultimosHechizos, 'ultimosObjetos' => $ultimosObjetos]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('hechizos', HechizoController::class);
    Route::resource('libros', LibroController::class);
    Route::resource('objetos', ObjetoController::class);
    Route::get('/hechizos/{id}', [HechizoController::class, 'show'])->name('hechizos.show');
    Route::get('/libros/{id}', [LibroController::class, 'show'])->name('libros.show');

});

require __DIR__.'/auth.php';

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');




