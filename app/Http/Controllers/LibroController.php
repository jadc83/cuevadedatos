<?php

namespace App\Http\Controllers;

use App\Models\Hechizo;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::paginate(12);


        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hechizos = Hechizo::all();
        return view('libros.create', ['hechizos' => $hechizos]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->idioma = $request->idioma;
        $libro->descripcion = $request->descripcion;
        $libro->coste_cordura = $request->coste_cordura;
        $libro->coste_tiempo = $request->coste_tiempo;
        $libro->mitos = $request->mitos;
        $libro->puntuacion = $request->puntuacion;
        $libro->autor = $request->autor;
        $libro->anyo = $request->anyo;

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

        return view('libros.show', ['libro'=> $libro]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        $hechizos = Hechizo::all(); // Obtenemos todos los hechizos disponibles
        $consulta = $libro->hechizos->pluck('id')->toArray(); // Obtenemos los IDs de los hechizos relacionados

        return view('libros.edit', compact('libro', 'hechizos', 'consulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $libro->titulo = $request->titulo;
        $libro->idioma = $request->idioma;
        $libro->descripcion = $request->descripcion;
        $libro->coste_cordura = $request->coste_cordura;
        $libro->coste_tiempo = $request->coste_tiempo;
        $libro->mitos = $request->mitos;
        $libro->puntuacion = $request->puntuacion;
        $libro->autor = $request->autor;
        $libro->anyo = $request->anyo;

        $libro->save();

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
        return redirect()->route('libros.index')->with('success', 'Libro eliminado con éxito.');
    }

}
