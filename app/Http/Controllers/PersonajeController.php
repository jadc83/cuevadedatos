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

        // Asignar los valores del formulario
        $personaje->user_id = $request->user_id;
        $personaje->nombre = $request->nombre;
        $personaje->profesion = $request->profesion;
        $personaje->edad = $request->edad;
        $personaje->nacionalidad = $request->nacionalidad;
        $personaje->estudios = $request->estudios;
        $personaje->fue = $request->fue;
        $personaje->con = $request->con;
        $personaje->des = $request->des;
        $personaje->tam = $request->tam;
        $personaje->apa = $request->apa;
        $personaje->int = $request->int;
        $personaje->pod = $request->pod;
        $personaje->edu = $request->edu;
        $personaje->cor = $request->cor;
        $personaje->cordura_maxima = $request->cordura_maxima;
        $personaje->ingresos = $request->ingresos;
        $personaje->ahorros = $request->ahorros;
        $personaje->efectivo = $request->efectivo;

        // Manejar la foto si fue cargada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos', 'public'); // Guardar en storage/app/public/fotos
            $personaje->foto = $fotoPath; // Asignar la ruta al modelo
        }

        // Guardar el personaje en la base de datos
        $personaje->save();

        // Redirigir al índice con un mensaje de éxito (opcional)
        return redirect()->route('personajes.index')->with('success', 'Personaje creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personaje $personaje)
    {
        $usuario = Auth::User();
        $habilidades = $usuario->habilidades;
        return view('personajes.show', ['habilidades'=> $habilidades, 'personaje' => $personaje]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personaje $personaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personaje $personaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personaje $personaje)
    {
        $personaje->delete();

        return redirect()->route('personajes.index');
    }
}
