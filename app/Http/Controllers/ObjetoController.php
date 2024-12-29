<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreObjetoRequest;
use App\Http\Requests\UpdateObjetoRequest;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreObjetoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Objeto $objeto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Objeto $objeto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateObjetoRequest $request, Objeto $objeto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Objeto $objeto)
    {
        //
    }
}
