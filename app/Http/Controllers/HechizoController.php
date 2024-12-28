<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Hechizo;
use Illuminate\Http\Request;

class HechizoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $consulta = Hechizo::query();

        if ($busqueda = $request->input('busqueda')) {
            $consulta->where('nombre', 'ilike', "%{$busqueda}%");
        }

        $hechizos = $consulta->paginate(10);

        return view('hechizos.index', ['hechizos' => $hechizos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('hechizos.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hechizo = New Hechizo();
        $hechizo->nombre = $request->nombre;
        $hechizo->coste = $request->coste;
        $hechizo->coste_cordura = $request->coste_cordura;
        $hechizo->turnos = $request->turnos;
        $hechizo->efecto = $request->efecto;
        $hechizo->intensificada = $request->intensificada;
        $hechizo->categoria_id = $request->categoria_id;
        $hechizo->save();

        return redirect()-> route('hechizos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hechizo $hechizo)
    {
        return view('hechizos.show', ['hechizo'=> $hechizo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hechizo $hechizo)
    {
        $categorias = Categoria::all();
        return view('hechizos.edit', ['hechizo'=>$hechizo, 'categorias'=>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hechizo $hechizo)
    {
        $hechizo->nombre = $request->nombre;
        $hechizo->efecto = $request->efecto;
        $hechizo->turnos = $request->turnos;
        $hechizo->coste = $request->coste;
        $hechizo->coste_cordura = $request->coste_cordura;
        $hechizo->intensificada = $request->intensificada;
        $hechizo->save();

        return redirect()-> route('hechizos.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encuentra el hechizo
        $hechizo = Hechizo::findOrFail($id);

        // Desasocia todos los libros del hechizo
        $hechizo->libros()->detach(); // Asegúrate de que la relación 'libros' esté definida en el modelo Hechizo

        // Elimina el hechizo
        $hechizo->delete();

        // Redirige con un mensaje de éxito
        return redirect()->route('hechizos.index')->with('success', 'Hechizo eliminado correctamente.');
    }

}
