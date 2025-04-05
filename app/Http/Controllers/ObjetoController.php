<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use App\Models\Personaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $objetos = $query->orderBy('denominacion', 'asc')->paginate(12);
        $jugador = Auth::user();
        $personaje = Personaje::find($jugador->personaje_id);

        return view('objetos.index', ['objetos' => $objetos, 'personaje' => $personaje]);
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
            'valor' => 'nullable',
            'stock' => 'required|integer'
        ]);

        $objeto = new Objeto();
        $validated['denominacion'] = $request->denominacion;
        $validated['descripcion'] = $request->descripcion;
        $validated['valor'] = $request->valor;
        $validated['stock'] = $request->stock;
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

        return view('objetos.show', ['objeto' => $objeto]);
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
        $objeto->valor = $request->valor;
        $objeto->stock = $request->stock;
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

    /**
     * Añade un objeto al carrito desde la vista del carrito
     */

    public function comprar($id)
    {
        $objeto = Objeto::findOrFail($id);
        $carrito = session('carrito', []);
        $existe = false;

        foreach ($carrito as &$item) {
            if ($item['id'] == $objeto->id) {
                // Cambiar '==' por '=' para asignar correctamente
                $item['denominacion'] = $objeto->denominacion; // Asignación correcta
                $item['valor'] = $objeto->valor; // Asignación correcta
                $item['cantidad'] += 1;  // Incrementa la cantidad
                $existe = true;
                break;
            }
        }

        if (!$existe) {
            $carrito[$objeto->id] = [
                'id' => $objeto->id,
                'denominacion' => $objeto->denominacion,
                'valor' => $objeto->valor,
                'cantidad' => 1,
            ];
        }
        session(['carrito' => $carrito]);

        // Mensaje flash para indicar éxito
        //session()->flash('exito', 'Artículo agregado al carrito.');

        return redirect()->route('objetos.index');
    }

    /**
     * Resta un objeto al carrito desde la vista del carrito
     */

    public function resta(objeto $objeto)
    {
        $carrito = session('carrito', []);

        if (isset($carrito[$objeto->id])) {
            if ($carrito[$objeto->id]['cantidad'] > 1) {
                $carrito[$objeto->id]['cantidad'] -= 1;
            } else {
                unset($carrito[$objeto->id]);
            }
        }
        session(['carrito' => $carrito]);
        return redirect()->route('objetos.index');
    }

    public function vaciar()
    {
        session()->forget('carrito');
        return redirect()->route('objetos.index');
    }


    public function eliminarDelCarrito($id)
    {
        $carrito = session('carrito', []);

        // Verificar si el carrito no está vacío
        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session(['carrito' => $carrito]); // Actualizar la sesión
            session()->flash('exito', 'Artículo eliminado del carrito.');
        } else {
            session()->flash('error', 'El artículo no se encontró en el carrito.');
        }

        return redirect()->route('objetos.index');
    }
    public function add(Objeto $objeto)
    {
        $carrito = session('carrito', []);

        if (isset($carrito[$objeto->id])) {
            $carrito[$objeto->id]['cantidad'] += 1;
        } else {
            $carrito[$objeto->id] = [
                'id' => $objeto->id,
                'nombre' => $objeto->denominacion,
                'precio' => $objeto->valor,
                'cantidad' => 1,
            ];
        }
        session(['carrito' => $carrito]);
        return redirect()->route('objetos.index');
    }

    public function pagar(Request $request)
    {
        $personaje = Personaje::find($request->input('personaje_id'));

        if (!$personaje) {
            return back()->with('error', 'Personaje no encontrado.');
        }

        $total = array_sum(array_map(function ($item) {
            return $item['valor'] * $item['cantidad'];
        }, session('carrito')));

        if ($personaje->ahorros >= $total) {

            $personaje->ahorros -= $total;
            $personaje->save();

            foreach (session('carrito') as $item) {
                $coincidencia = DB::table('objeto_personaje')
                    ->where('personaje_id', $personaje->id)
                    ->where('objeto_id', $item['id'])
                    ->first();

                if ($coincidencia) {
                    DB::table('objeto_personaje')
                        ->where('personaje_id', $personaje->id)
                        ->where('objeto_id', $item['id'])
                        ->update([
                            'cantidad' => $coincidencia->cantidad + $item['cantidad'],
                            'updated_at' => now(),
                        ]);
                } else {
                    DB::table('objeto_personaje')->insert([
                        'personaje_id' => $personaje->id,
                        'objeto_id' => $item['id'],
                        'cantidad' => $item['cantidad'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                DB::table('objetos')
                    ->where('id', $item['id'])
                    ->decrement('stock', $item['cantidad']);
            }

            session()->forget('carrito');

            return redirect()->route('objetos.index')->with('success', 'Compra realizada con éxito.');
        } else {
            return back()->with('error', 'No tienes suficientes ahorros para realizar el pago.');
        }
    }
    public function soltarTodo(Personaje $personaje, Objeto $objeto)
    {
        // Verificar que el objeto esté en el inventario del personaje
        if (! $personaje->objetos->contains($objeto->id)) {
            abort(403, 'Este objeto no pertenece al personaje.');
        }

        $personaje->objetos()->detach($objeto->id);

        return back()->with('status', 'Objeto soltado correctamente.');
    }

    public function soltar(Personaje $personaje, Objeto $objeto)
    {
        $relacion = $personaje->objetos()->where('objeto_id', $objeto->id)->first();

        if (! $relacion) {
            abort(403, 'Este objeto no pertenece al personaje.');
        }

        $cantidadActual = $relacion->pivot->cantidad;

        if ($cantidadActual > 1) {
            // Solo restamos 1
            $personaje->objetos()->updateExistingPivot($objeto->id, [
                'cantidad' => $cantidadActual - 1,
            ]);
        } else {
            // Si solo tiene 1, eliminamos la relación
            $personaje->objetos()->detach($objeto->id);
        }

        return back()->with('status', 'Objeto soltado correctamente.');
    }




}
