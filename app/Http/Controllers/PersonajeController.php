<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonajeRequest;
use App\Http\Requests\UpdatePersonajeRequest;
use App\Models\Especializacion;
use App\Models\Comentario;
use App\Models\Personaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Faker\Provider\ar_EG\Person;
use App\Models\Familia;

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
        return view('personajes.create', ["users" => User::all()]);
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
            'sue' => 'required|integer|between:0, 99',
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
        $validated['cor'] = $request->pod;
        $validated['cor_actual'] = $request->pod;
        $validated["sue"] = $request->sue;
        $validated['efectivo'] = $request->efectivo;
        $validated['ingresos'] = $request->ingresos;
        $validated['ahorros'] = $request->ahorros;
        $validated['hp'] = floor(($request->con/5 + $request->tam/5)/2);
        $validated['mp'] = floor($request->pod/5);
        $validated['esquiva'] = $request->des;


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

        return view('personajes.show', ['personaje' => $personaje, 'familias' => Familia::all()]);
    }
    public function editHabilidades(Personaje $personaje)
    {
        return view('personajes.editHabilidades', ['personaje' => $personaje]);
    }
    public function updateHabilidades(Personaje $personaje, Request $request)
    {
        $validated = $request->validate([
            'antropologia' => 'required|integer|between:0, 9999',
            'arqueologia' => 'required|integer|between:0, 9999',
            'buscar_libros' => 'required|integer|between:0, 9999',
            'cerrajeria' => 'required|integer|between:0, 9999',
            'charlataneria' => 'required|integer|between:0, 9999',
            'ciencias_ocultas' => 'required|integer|between:0, 9999',
            'conducir_automovil' => 'required|integer|between:0, 9999',
            'conducir_maquinaria' => 'required|integer|between:0, 9999',
            'contabilidad' => 'required|integer|between:0, 9999',
            'credito' => 'required|integer|between:0, 9999',
            'derecho' => 'required|integer|between:0, 9999',
            'descubrir' => 'required|integer|between:0, 9999',
            'disfrazarse' => 'required|integer|between:0, 9999',
            'electricidad' => 'required|integer|between:0, 9999',
            'encanto' => 'required|integer|between:0, 9999',
            'equitación' => 'required|integer|between:0, 9999',
            'escuchar' => 'required|integer|between:0, 9999',
            'esquivar' => 'required|integer|between:0, 9999',
            'historia' => 'required|integer|between:0, 9999',
            'intimidar' => 'required|integer|between:0, 9999',
            'juego_de_manos' => 'required|integer|between:0, 9999',
            'lanzar' => 'required|integer|between:0, 9999',
            'mecanica' => 'required|integer|between:0, 9999',
            'medicina' => 'required|integer|between:0, 9999',
            'mitos_cthulhu' => 'required|integer|between:0, 9999',
            'nadar' => 'required|integer|between:0, 9999',
            'naturaleza' => 'required|integer|between:0, 9999',
            'orientarse' => 'required|integer|between:0, 9999',
            'persuasion' => 'required|integer|between:0, 9999',
            'primeros_auxilios' => 'required|integer|between:0, 9999',
            'psicoanalisis' => 'required|integer|between:0, 9999',
            'psicologia' => 'required|integer|between:0, 9999',
            'saltar' => 'required|integer|between:0, 9999',
            'seguir_rastros' => 'required|integer|between:0, 9999',
            'sigilo' => 'required|integer|between:0, 9999',
            'trepar' => 'required|integer|between:0, 9999',
        ]);

        $personaje->update($validated);
        $personaje->save();
        return redirect()->route('personajes.index')->with('success', 'Personaje creado con éxito.');
    }
    public function updateHabilidad(Personaje $personaje, Request $request)
    {
        $request->validate([
            'habilidad_id' => 'required|string',
            'puntuacion' => 'required|integer|between:0, 9999',
        ]);

        // Actualiza la habilidad correspondiente
        $habilidad = $request->habilidad_id;
            $personaje->$habilidad = $request->puntuacion;
            $personaje->save();

        return redirect()->route('personajes.show', $personaje)->with('success', 'Habilidad modificada con éxito.');

    }
    public function updateEspecializacion(Personaje $personaje, Request $request)
    {
        $request->validate([
            'especializacion2_id' => 'required',
            'puntuacion' => 'required|between:0, 9999',
        ]);
        $especializacionId = $request->especializacion2_id;
        $nuevaPuntuacion = $request->puntuacion;
        $personaje->especializaciones()->updateExistingPivot($especializacionId, [
            'puntuacion' => $nuevaPuntuacion
        ]);

        return redirect()->route('personajes.show', $personaje)->with('success', 'Especialización modificada con éxito.');
    }

    public function informacion($id)
    {
        // Cargar todos los personajes (si es necesario para el formulario)
        $personajes = Personaje::all();

        // Cargar el personaje específico junto con sus comentarios
        $personaje = Personaje::with('comentarios')->findOrFail($id); // Cambia a findOrFail para manejar casos donde el ID no existe

        return view('personajes.informacion', [
            'personaje' => $personaje,
            'personajes' => $personajes
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personaje $personaje)
    {
        return view('personajes.edit', ['personaje' => $personaje, 'users' => User::all()]);
    }
    public function especializacion(Personaje $personaje, Request $request)
    {
        $especializacion = Especializacion::findOrFail($request->especializacion_id);
        $puntuacion = $especializacion->familia->base;

        $personaje->especializaciones()->attach($especializacion->id, ['puntuacion' => $puntuacion]);

        return redirect()->route('personajes.show', $personaje);
    }

    public function desespecializacion(Personaje $personaje, Request $request)
    {
        // Accede a la relación 'especializaciones' y usa detach
        $personaje->especializaciones()->detach($request->especializacion3_id);
        return redirect()->route('personajes.show', $personaje);
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
            'cor' => 'required|integer|between:3, 99',
            'cor_actual' => 'required|integer|between:0, 99',
            'ingresos' => 'nullable|numeric',
            'ahorros' => 'nullable|numeric',
            'efectivo' => 'nullable|numeric',
        ]);

        if ($request->cor > 99 - $request->mitos_cuthulu) {
            return redirect()->back()
                ->withErrors(['cor' => 'El valor de cor no puede ser mayor a 99 menos el valor de mitos de cuthulu: ' . 99 - $request->mitos_cuthulu])
                ->withInput();
        }

        if ($request->cor_actual > 99 - $request->mitos_cuthulu) {
            return redirect()->back()
                ->withErrors(['cor_actual' => 'El valor de cordura_actual no puede ser mayor a 99 menos el valor de mitos_cuthulu(): ' . 99 - $request->mitos_cuthulu])
                ->withInput();
        }

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
        $validated['cordura_actual'] = $request->cor_actual;
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
    public function comentar(Request $request, Personaje $personaje)
    {
        $request->validate([
            'contenido' => 'required|string|max:500',
            'personaje_id' => 'required|exists:personajes,id', // Asegúrate de que este campo sea requerido
            'escritor_id' => 'required|exists:personajes,id', // El personaje que escribe el comentario
        ]);

        // Crear el comentario
        Comentario::create([
            'contenido' => $request->contenido,
            'personaje_id' => $request->personaje_id,
            'comentable_type' => 'App\Models\Personaje', // Cambia esto si es necesario
            'comentable_id' => $request->personaje_id,   // ID del modelo comentable (el mismo personaje)
        ]);

        // Redirigir a la vista del personaje
        return redirect()->route('personajes.informacion', ['id' => $request->personaje_id])
                         ->with('success', 'Comentario agregado con éxito.');
    }


}
