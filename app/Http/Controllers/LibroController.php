<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Hechizo;
use App\Models\Idioma;
use App\Models\Libro;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Libro::query();

        if ($busqueda = $request->input('busqueda')) {
            $query->where('titulo', 'ilike', "%{$busqueda}%")
                  ->orWhere('autor', 'ilike', "%{$busqueda}%")
                  ->orWhere('descripcion', 'ilike', "%{$busqueda}%");
        }

        $libros = $query->paginate(10);

        return view('libros.index', ['libros' => $libros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hechizos = Hechizo::all();
        $idiomas = Idioma::all();
        $categorias = Categoria::all();
        return view('libros.create', ['hechizos' => $hechizos, 'categorias' => $categorias, 'idiomas' => $idiomas]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'idioma' => 'required|string|max:50',
            'descripcion' => 'required|string|max:2000',
            'coste_cordura' => 'required',
            'coste_tiempo' => 'required',
            'mitos' => 'required',
            'autor' => 'required|string|max:50',
            'anyo' => ['required', 'regex:/^\d{1,9}\s?(ac|dc)$/i'],
            'user_id' => 'exists:users,id',
        ]);


        $validated['titulo'] = $request->titulo;
        $validated['idioma'] = $request->idioma;
        $validated['descripcion'] = $request->descripcion;
        $validated['coste_cordura'] = $request->coste_cordura;
        $validated['coste_tiempo'] = $request->coste_tiempo;
        $validated['mitos'] = $request->mitos;
        $validated['autor'] = $request->autor;
        $validated['anyo'] = $request->anyo;
        $validated['user_id'] = $request->user_id;
        $libro = new Libro();
        $libro->fill($validated);
        $libro->save();

        if ($request->has('hechizos')) {
            $insercion = [];
            foreach ($request->hechizos as $hechizo) { /* Aunque se llame hechizos, es un array que contiene solo los id recogidos en el formulario */
                $insercion[] = ['hechizo_id' => $hechizo, 'libro_id' => $libro->id, 'pivote' => 'pivote'];
            }
            $libro->hechizos()->attach($insercion);
        }

        return redirect()->route('libros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {

        $ejemplar = Libro::where('user_id', $libro->user_id)->get();
        $uploader = User::where('id', $ejemplar[0]->user_id)->first(['name']); // Usar 'first()' para obtener un solo usuario
        dd($uploader);

        return view('libros.show', ['libro'=> $libro, 'uploader' => $uploader]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        $hechizos = Hechizo::all();
        $idiomas = Idioma::all();
        $consulta = $libro->hechizos->pluck('id')->toArray();

        return view('libros.edit', compact('libro', 'hechizos', 'consulta', 'idiomas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'idioma' => 'required|string|max:50',
            'descripcion' => 'required|string|max:2000',
            'coste_cordura' => 'required',
            'coste_tiempo' => 'required',
            'mitos' => 'required',
            'autor' => 'required|string|max:50',
            'anyo' => ['required', 'regex:/^\d{1,9}\s?(ac|dc)$/i']
        ]);

        $validated['titulo'] = $request->titulo;
        $validated['idioma'] = $request->idioma;
        $validated['descripcion'] = $request->descripcion;
        $validated['coste_cordura'] = $request->coste_cordura;
        $validated['coste_tiempo'] = $request->coste_tiempo;
        $validated['mitos'] = $request->mitos;
        $validated['autor'] = $request->autor;
        $validated['anyo'] = $request->anyo;
        $libro->update($validated);
        $consulta = [];

        if ($request->has('hechizos')) {
            foreach ($request->hechizos as $hechizo) {
                $consulta[$hechizo] = ['pivote' => 'pivote'];
            }
        }

        $libro->hechizos()->sync($consulta);

        return redirect()->route('libros.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->hechizos()->detach();
        $libro->delete();
        return redirect()->route('libros.index')->with('exito', 'Libro eliminado con éxito.');
    }

}
