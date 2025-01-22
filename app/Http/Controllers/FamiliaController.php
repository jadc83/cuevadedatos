<?php

namespace App\Http\Controllers;

use App\Models\Familia;
use Illuminate\Http\Request;
class FamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('familias.index', ['familias' => Familia::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('familias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'base' => 'required|integer|between:0,9999',
        ]);

        $familia = new Familia();
        $familia->fill($validated);
        $familia->save();

        return redirect()->route('familias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Familia $familia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Familia $familia)
    {
        return view('familias.edit', ['familia' => $familia]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Familia $familia)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'base' => 'required|integer|between:0,9999',
        ]);

        $familia->fill($validated);
        $familia->save();

        return redirect()->route('familias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Familia $familia)
    {
        $familia->delete();
        return redirect()->route('familias.index');
    }
}
