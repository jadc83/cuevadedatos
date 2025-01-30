<?php

namespace App\Http\Controllers;

use App\Models\TipoArma;
use Illuminate\Http\Request;

class TipoArmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tipoArmas.index', ['tipoArmas' => TipoArma::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipoArmas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $tipoArma = new TipoArma();
        $tipoArma->fill($validated);
        $tipoArma->save();

        return redirect()->route('tipoArmas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoArma $tipoArma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipoArma $tipoArma)
    {
        return view('tipoArmas.edit', ['tipoArma' => $tipoArma]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipoArma $tipoArma)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $tipoArma->fill($validated);
        $tipoArma->save();

        return redirect()->route('tipoArmas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoArma $tipoArma)
    {
        $tipoArma->delete();
        return redirect()->route('tipoArmas.index');
    }
}
