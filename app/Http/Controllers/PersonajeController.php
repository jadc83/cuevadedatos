<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonajeRequest;
use App\Http\Requests\UpdatePersonajeRequest;
use App\Models\Personaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Personaje::query();

        if ($busqueda = $request->input('busqueda')) {
            $query->where('nombre', 'ilike', "%{$busqueda}%")
                  ->orWhere('profesion', 'ilike', "%{$busqueda}%")
                  ->orWhere('nacionalidad', 'ilike', "%{$busqueda}%");
        }

        $personajes = $query->paginate(10);

        return view('personajes.index', ['personajes' => $personajes]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personajes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $personaje = new Personaje();

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id|',
            'nombre' => 'required|string|max:50',
            'profesion' => 'string|max:100|nullable',
            'edad' => 'integer|between:0,999999|nullable',
            'nacionalidad' => 'string|max:255|nullable',
            'estudios' => 'string|max:255|nullable',
            'fue' => 'required|integer|between:3, 9999',
            'con' => 'required|integer|between:3, 9999',
            'des' => 'required|integer|between:3, 9999',
            'tam' => 'required|integer|between:6, 9999',
            'int' => 'required|integer|between:6, 9999',
            'apa' => 'required|integer|between:3, 9999',
            'pod' => 'required|integer|between:3, 9999',
            'edu' => 'required|integer|between:6, 9999',
            'cor' => 'required|integer|between:3, 99',
            'cordura_maxima' => 'required|integer|between:0, 99',
            'ingresos' => 'nullable|numeric',
            'ahorros' => 'nullable|numeric',
            'efectivo' => 'nullable|numeric',
        ]);

        $validated['user_id'] = $request->user_id;
        $validated['nombre'] = $request->nombre;
        $validated['profesion'] = $request->profesion;
        $validated['edad'] = $request->edad;
        $validated['coste_tiempo'] = $request->coste_tiempo;
        $validated['nacionalidad'] = $request->nacionalidad;
        $validated['estudios'] = $request->estudios;
        $validated['fue'] = $request->fue;
        $validated['con'] = $request->con;
        $validated['des'] = $request->des;
        $validated['tam'] = $request->tam;
        $validated['int'] = $request->int;
        $validated['apa'] = $request->apa;
        $validated['pod'] = $request->pod;
        $validated['edu'] = $request->edu;
        $validated['cor'] = $request->cor;
        $validated['cordura_maxima'] = $request->cordura_maxima;
        $validated['efectivo'] = $request->efectivo;
        $validated['ingresos'] = $request->ingresos;
        $validated['ahorros'] = $request->ahorros;

        $personaje->fill($validated);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos', 'public'); // Guardar en storage/app/public/fotos
            $personaje->foto = $fotoPath; // Asignar la ruta al modelo
        }

        $personaje->save();
        return redirect()->route('personajes.index')->with('success', 'Personaje creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personaje $personaje)
    {

        return view('personajes.show', ['personaje' => $personaje]);
    }

    public function informacion($id)
    {
        $investigadores = Personaje::all();
        $personaje = Personaje::find($id);
        return view('personajes.informacion', ['personaje' => $personaje, 'investigadores' => $investigadores]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personaje $personaje)
    {
        return view('personajes.edit', ['personaje' => $personaje ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personaje $personaje)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id|',
            'nombre' => 'required|string|max:50',
            'profesion' => 'string|max:100|nullable',
            'edad' => 'integer|between:0,999999|nullable',
            'nacionalidad' => 'string|max:255|nullable',
            'estudios' => 'string|max:255|nullable',
            'fue' => 'required|integer|between:3, 9999',
            'con' => 'required|integer|between:3, 9999',
            'des' => 'required|integer|between:3, 9999',
            'tam' => 'required|integer|between:6, 9999',
            'int' => 'required|integer|between:6, 9999',
            'apa' => 'required|integer|between:3, 9999',
            'pod' => 'required|integer|between:3, 9999',
            'edu' => 'required|integer|between:6, 9999',
            'cor' => 'required|integer|between:3, 99',
            'cordura_maxima' => 'required|integer|between:0, 99',
            'ingresos' => 'nullable|numeric',
            'ahorros' => 'nullable|numeric',
            'efectivo' => 'nullable|numeric',
        ]);

        $validated['user_id'] = $request->user_id;
        $validated['nombre'] = $request->nombre;
        $validated['profesion'] = $request->profesion;
        $validated['edad'] = $request->edad;
        $validated['coste_tiempo'] = $request->coste_tiempo;
        $validated['nacionalidad'] = $request->nacionalidad;
        $validated['estudios'] = $request->estudios;
        $validated['fue'] = $request->fue;
        $validated['con'] = $request->con;
        $validated['des'] = $request->des;
        $validated['tam'] = $request->tam;
        $validated['int'] = $request->int;
        $validated['apa'] = $request->apa;
        $validated['pod'] = $request->pod;
        $validated['edu'] = $request->edu;
        $validated['cor'] = $request->cor;
        $validated['cordura_maxima'] = $request->cordura_maxima;
        $validated['efectivo'] = $request->efectivo;
        $validated['ingresos'] = $request->ingresos;
        $validated['ahorros'] = $request->ahorros;

        $personaje->fill($validated);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos', 'public'); // Guardar en storage/app/public/fotos
            $personaje->foto = $fotoPath; // Asignar la ruta al modelo
        }

        $personaje->save();
        return redirect()->route('personajes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personaje $personaje)
    {
        $personaje->delete();

        return redirect()->route('personajes.index');
    }

    public function res($id)
    {
        $personaje = Personaje::onlyTrashed()->find($id);
        $personaje->restore();

        // Redirige a la lista de personajes
        return redirect()->route('personajes.index')->with('success', 'Personaje restaurado correctamente.');
    }
}
