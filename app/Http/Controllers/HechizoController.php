<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Hechizo;
use App\Models\User;
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
            $consulta->where('nombre', 'ilike', "%{$busqueda}%")
            ->orWhere('efecto', 'ilike', "%{$busqueda}%");
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
        $ejemplar = Hechizo::where('user_id', $hechizo->user_id)->first();

        return view('hechizos.show', ['hechizo' => $hechizo]);
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
        $hechizo->user_id = $request->user_id;
        $hechizo->save();

        return redirect()-> route('hechizos.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hechizo = Hechizo::find($id);
        $hechizo->libros()->detach();
        $hechizo->delete();

        return redirect()->route('hechizos.index')->with('exito', 'Hechizo eliminado correctamente.');
    }

}
