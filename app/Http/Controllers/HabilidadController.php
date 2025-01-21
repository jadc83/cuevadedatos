<?php

namespace App\Http\Controllers;

use App\Models\Habilidad;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;
use App\Models\Objeto;


class HabilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Habilidad::query();

        if ($busqueda = $request->input('busqueda')) {
            $query->where('nombre', 'ilike', "%{$busqueda}%")
                  ->orWhere('descripcion', 'ilike', "%{$busqueda}%");
        }

        $habilidades = $query->paginate(10);

        return view('habilidades.index', ['habilidades' => $habilidades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('habilidades.create', ['objetos' => Objeto::all(),'objeto_id'=> $request->input('objeto_id')]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:2000',
            'objeto_id' => 'required|not_regex:/^$/'
        ]);


        $validated['nombre'] = $request->nombre;
        $validated['descripcion'] = $request->descripcion;
        $validated['objeto_id'] = $request->objeto_id;
        $habilidad = new Habilidad();
        $habilidad->fill($validated);
        $habilidad->save();



        $objeto = Objeto::findOrFail($request->objeto_id);

        return redirect()->route('objetos.show', ['objeto' => $objeto]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Habilidad $habilidad)
    {

        return view('habilidades.show', ['habilidad'=> $habilidad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habilidad $habilidad)
    {

        return view('habilidades.edit',compact('habilidad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habilidad $habilidad)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:2000',
        ]);

        $validated['nombre'] = $request->nombre;
        $validated['descripcion'] = $request->descripcion;
        $habilidad->update($validated);


        return redirect()->route('habilidades.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habilidad $habilidad)
    {
        $habilidad->delete();

        $objeto = Objeto::findOrFail($habilidad->objeto_id);

        return redirect()->route('objetos.show', ['objeto' => $objeto]);
    }

}
