<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use Illuminate\Http\Request;

class ObjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Objeto::query();

        if ($busqueda = $request->input('busqueda')) {
            $query->where('denominacion', 'ilike', "%{$busqueda}%")
                  ->orWhere('descripcion', 'ilike', "%{$busqueda}%");
        }

        $objetos = $query->paginate(10);

        return view('objetos.index', ['objetos' => $objetos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('objetos.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'denominacion' => 'required|string|max:255',
            'descripcion' => 'required|string|max:4000',
            'efecto' => 'nullable|string|max:4000',
            'valor' => 'nullable',
        ]);

        $objeto = new Objeto();
        $validated['denominacion'] = $request->denominacion;
        $validated['descripcion'] = $request->descripcion;
        $validated['efecto'] = $request->efecto;
        $validated['valor'] = $request->valor;
        $objeto = new Objeto();
        $objeto->fill($validated);
        $objeto->save();

        return redirect()->route('objetos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Objeto $objeto)
    {

        return view('objetos.show', ['objeto'=> $objeto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Objeto $objeto)
    {
        return view('objetos.edit', ['objeto' => $objeto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Objeto $objeto)
    {
        $objeto->denominacion = $request->denominacion;
        $objeto->descripcion = $request->descripcion;
        $objeto->efecto = $request->efecto;
        $objeto->valor = $request->valor;
        $objeto->save();

        return redirect()->route('objetos.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Objeto $objeto)
    {
        $objeto->delete();
        return redirect()->route('objetos.index')->with('success', 'Objeto eliminado con éxito.');
    }

}
