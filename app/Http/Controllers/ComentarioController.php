<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateComentarioRequest;
use App\Models\Comentario;
use App\Models\Personaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'personaje_id' => 'required|exists:personajes,id',
            'contenido' => 'required|string|max:255',
        ]);

        // Obtener el personaje
        $personaje = Personaje::find($validated['personaje_id']);

        // Verificar si el usuario autenticado es el dueño del personaje
        if ($personaje->user_id === Auth::id()) { // Asegúrate de que 'user_id' es el campo correcto en tu modelo Personaje
            // Crear el comentario
            $personaje->comentarios()->create([
                'contenido' => $validated['contenido'],
                'personaje_id' => $validated['personaje_id'],
            ]);

            return redirect()->back()->with('success', 'Comentario enviado correctamente.');
        } else {
            return redirect()->back()->with('error', 'No puedes comentar un personaje que no es tuyo.');
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComentarioRequest $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        $comentario->delete();

        return redirect()->back();
    }
}
