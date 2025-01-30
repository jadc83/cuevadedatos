<?php

namespace App\Http\Controllers;

use App\Models\Arma;
use App\Models\Especializacion;
use App\Models\TipoArma;
use Illuminate\Http\Request;

class ArmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('armas.index', [
            'armas' => Arma::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $especializaciones = Especializacion::whereHas('familia', function ($query) {
            $query->whereIn('nombre', ['Armas de fuego', 'Combatir']);
        })->get();

        return view('armas.create', ["tipoArmas" => TipoArma::all(), "especializaciones" => $especializaciones]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $arma = new Arma();

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'dano' => 'required|string|max:255',
            'alcance' => 'required|integer|between:1,9999',
            'usos' => 'required|string|max:255',
            'cargador' => 'required|integer|between:1,9999',
            'fd' => 'required|integer|between:1,100',
            'epoca' => 'required|string|max:255',
            'valorLegal' => 'nullable|numeric|between:0,9999',
            'valorIlegal' => 'nullable|numeric|between:0,9999',
            'tipo_arma_id' => 'required',
            'especializacion_id' => 'required',
        ]);

        $arma->fill($request->all());
        $arma->save();
        return redirect()->route('armas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Arma $arma)
    {
        return view('armas.show', compact('arma'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arma $arma)
    {
        return view('armas.edit', [
            'arma' => $arma,
            'tipoArmas' => TipoArma::all(),
            'especializaciones' => Especializacion::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arma $arma)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'dano' => 'required|string|max:255',
            'alcance' => 'required|integer|between:1,9999',
            'usos' => 'required|string|max:255',
            'cargador' => 'required|integer|between:1,9999',
            'fd' => 'required|integer|between:1,100',
            'epoca' => 'required|string|max:255',
            'valorLegal' => 'nullable|numeric|between:0,9999',
            'valorIlegal' => 'nullable|numeric|between:0,9999',
            'tipo_arma_id' => 'required',
            'especializacion_id' => 'required',
        ]);
        $arma->fill($request->all());
        $arma->save();
        return redirect()->route('armas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arma $arma)
    {
        $arma->delete();
        return redirect()->route('armas.index');
    }
}
