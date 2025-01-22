<?php

namespace App\Http\Controllers;

use App\Models\Especializacion;
use App\Models\Familia;
use Illuminate\Http\Request;


class EspecializacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('especializaciones.index', [
            'especializaciones' => Especializacion::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('especializaciones.create', ["familias" => Familia::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'familia_id' => 'required'
        ]);

        Especializacion::create($request->all());

        return redirect()->route('especializaciones.index')
            ->with('success', 'Especialización creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Especializacion $especializacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especializacion $especializacion)
    {
        return view('especializaciones.edit', ['especializacion' => $especializacion, 'familias' => Familia::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Especializacion $especializacion)
    {
        $request->validate([
            'nombre' => 'required',
            'familia_id' => 'required'
        ]);

        $especializacion->update($request->all());

        return redirect()->route('especializaciones.index')
            ->with('success', 'Especialización actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especializacion $especializacion)
    {
        $especializacion->delete();

        return redirect()->route('especializaciones.index')
            ->with('success', 'Especialización eliminada correctamente.');
    }
}
