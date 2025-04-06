<x-app-layout>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="min-h-screen bg-gray-800 p-6">
        <div class="w-8/12 mx-auto bg-gray-800 px-12  text-white font-semibold">
            <h2 class="text-2xl font-bold text-center mb-4 py-5">{{ $personaje->nombre }}</h2>
            <div class="text-center">
                <p><strong>Jugador:</strong> {{ $personaje->user->name }}</p>
            </div>
            <div class="flex justify-center items-start space-x-8 w-full">
                <!-- Imagen del personaje -->
                <div class="flex justify-center items-center bg-gray-800 rounded-lg shadow-lg min-h-[380px] w-[260px]">
                    @if ($personaje->foto)
                        <img class="h-[12em] rounded-lg " src="{{ asset('storage/' . $personaje->foto) }}"
                            alt="Foto de {{ $personaje->nombre }}">
                    @else
                        <p class="text-gray-500 text-center">No hay foto disponible</p>
                    @endif
                </div>

                <!-- Tabla de estadísticas -->
                <div class="bg-gray-800 text-white rounded-lg min-h-[240px] w-[260px] flex flex-col justify-left mt-20 ">
                    <table class="w-full text-center">
                        <tbody>
                            <tr>
                                <td class="px-4 font-semibold">HP</td>
                                <td class="px-4">
                                    <x-habilidad-single habilidad-id="hp" puntuacion="{{ $personaje->hp }}" nombre="Vida actual" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 font-semibold">MaxHP</td>
                                <td class="px-4">
                                    {{ floor(($personaje->con / 5 + $personaje->tam / 5) / 2) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 font-semibold">MP</td>
                                <td class="px-4">
                                    <x-habilidad-single habilidad-id="mp" puntuacion="{{ $personaje->mp }}" nombre="Magia actual" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 font-semibold">MaxMP</td>
                                <td class="px-4">{{ floor($personaje->pod / 5) }}</td>
                            </tr>
                            <tr>
                                <td class="px-4 font-semibold">Suerte</td>
                                <td class="px-4">{{ $personaje->sue }}</td>
                            </tr>
                            <tr>
                                <td class="px-4 font-semibold">Cordura inicial</td>
                                <td class="px-4">
                                    <x-habilidad-single habilidad-id="cor" puntuacion="{{ $personaje->cor }}" nombre="Cordura inicial" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 font-semibold">Cordura</td>
                                <td class="px-4">
                                    <x-habilidad-single habilidad-id="cor_actual" puntuacion="{{ $personaje->cor_actual }}" nombre="Cordura actual" />
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 font-semibold">MaxCOR</td>
                                <td class="px-4">{{ 99 - $personaje->mitos_cthulhu }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>




            <!--Enlaces de mensajes e inventario -->
            <div class="flex p-2 justify-center">
                <form action="{{ route('personajes.informacion', $personaje) }}" method="get">
                    <x-primary-button>Mensajes</x-primary-button>
                </form>
                <form action="{{ route('personajes.inventario', $personaje) }}" method="get">
                    <x-primary-button>Inventario</x-primary-button>
                </form>
            </div>

            <div class="grid grid-cols-1 cols-2 gap-6 text-center">
                <!--Informacion personal -->
                <table class="w-full shadow  bg-gray-800 border border-amber-700">
                    <thead class="bg-gray-800 text-black">
                        <tr>
                            <th class=" px-4 py-2 text-amber-700"> ☰ Profesión ☰ </th>
                            <th class=" px-4 py-2 text-amber-700">☰ Nacionalidad ☰</th>
                            <th class=" px-4 py-2 text-amber-700">☰ Estudios ☰</th>
                            <th class=" px-4 py-2 text-amber-700">☰ Edad ☰</th>
                            <th class=" px-4 py-2 text-amber-700">☰ Ingresos ☰</th>
                            <th class=" px-4 py-2 text-amber-700">☰ Ahorros ☰</th>
                            <th class=" px-4 py-2 text-amber-700">☰ Efectivo ☰</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class=" px-4 py-2">{{ $personaje->profesion }}</td>
                            <td class=" px-4 py-2">{{ $personaje->nacionalidad }}</td>
                            <td class=" px-4 py-2">{{ $personaje->estudios }}</td>
                            <td class=" px-4 py-2">{{ $personaje->edad }}</td>
                            <td class=" px-4 py-2">
                                <button
                                    class="border rounded border-amber-700 text-white font-bold py-1 px-3  modificarHabilidadBtn"
                                    data-habilidad-id="{{ 'ingresos' }}"
                                    data-puntuacion="{{ $personaje->ingresos }}" data-nombre="{{ 'Ingresos' }}">
                                    ${{ $personaje->ingresos }}
                                </button>
                            </td>
                            <td class=" px-4 py-2">
                                <button
                                    class="border rounded border-amber-700 text-white font-bold py-1 px-3  modificarHabilidadBtn"
                                    data-habilidad-id="{{ 'ahorros' }}"
                                    data-puntuacion="{{ $personaje->ahorros }}" data-nombre="{{ 'Ahorro' }}">
                                    ${{ $personaje->ahorros }}
                                </button>
                            </td>
                            <td class=" px-4 py-2">
                                <button
                                    class="border rounded border-amber-700 text-white font-bold py-1 px-3  modificarHabilidadBtn"
                                    data-habilidad-id="{{ 'efectivo' }}"
                                    data-puntuacion="{{ $personaje->efectivo }}" data-nombre="{{ 'Efectivo' }}">
                                    ${{ $personaje->efectivo }}
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="grid grid-cols-1  gap-6 mt-4">
                <h2 class="text-2xl font-bold text-center text-amber-700  p-2">Caracteristicas</h2>
                <table class="w-full text-amber-700 border border-amber-700 bg-gray-800 shadow  text-center mx-auto">
                    <tbody>
                        <tr>
                            <td class=" px-4 py-2">
                                <x-habilidad-button habilidad-id="fue" puntuacion="{{ $personaje->fue }}"
                                    nombre="FUE" />
                            </td>
                            <td class=" px-4 py-2">
                                <x-habilidad-button habilidad-id="con" puntuacion="{{ $personaje->con }}"
                                    nombre="CON" />
                            </td>
                            <td class=" px-4 py-2">
                                <x-habilidad-button habilidad-id="des" puntuacion="{{ $personaje->des }}"
                                    nombre="DES" />
                            </td>
                        </tr>
                        <tr>
                            <td class=" px-4 py-2">
                                <x-habilidad-button habilidad-id="tam" puntuacion="{{ $personaje->tam }}"
                                    nombre="TAM" />
                            </td>
                            <td class=" px-4 py-2">
                                <x-habilidad-button habilidad-id="apa" puntuacion="{{ $personaje->apa }}"
                                    nombre="APA" />
                            </td>
                            <td class=" px-4 py-2">
                                <x-habilidad-button habilidad-id="int" puntuacion="{{ $personaje->int }}"
                                    nombre="INT" />
                            </td>
                        </tr>
                        <tr>
                            <td class=" px-4 py-2">
                                <x-habilidad-button habilidad-id="pod" puntuacion="{{ $personaje->pod }}"
                                    nombre="POD" />
                            </td>
                            <td class=" px-4 py-2">
                                <x-habilidad-button habilidad-id="edu" puntuacion="{{ $personaje->edu }}"
                                    nombre="EDU" />
                            </td>
                            <td class=" px-4 py-2">
                                <x-habilidad-button habilidad-id="mov" puntuacion="Soon" nombre="MOV" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h2 class="text-2xl font-bold text-center text-amber-700 p-4">Habilidades</h2>

            <div class="flex w-full border border-amber-700">
                <div class="w-full flex-col">
                    <table class="w-full shadow bg-gray-800">
                        <tbody>
                            <tr class="text-center">
                                <td class="px-2  w-full">
                                    <x-habilidad-button habilidad-id="antropologia"
                                        puntuacion="{{ $personaje->antropologia }}" nombre="Antropología" />
                                </td>
                            </tr>

                            <tr>
                                <td class=" px-2 ">
                                    <x-especializacion-block familia="Armas de fuego" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Armas de fuego')" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="antropologia"
                                        puntuacion="{{ $personaje->antropologia }}" nombre="Antropología" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="arqueologia"
                                        puntuacion="{{ $personaje->arqueologia }}" nombre="Arqueologia" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-especializacion-block familia="Arte/Artesania" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Arte/Artesania')" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="cerrajeria"
                                        puntuacion="{{ $personaje->cerrajeria }}" nombre="Cerrajeria" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="charlataneria"
                                        puntuacion="{{ $personaje->charlataneria }}" nombre="Charlataneria" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="charlataneria"
                                        puntuacion="{{ $personaje->charlataneria }}" nombre="Charlatanería" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-especializacion-block familia="Ciencia" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Ciencia')" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="ciencias_ocultas"
                                        puntuacion="{{ $personaje->ciencias_ocultas }}" nombre="Ciencias ocultas" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-especializacion-block familia="Combatir" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Combatir')" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="conducir_automovil"
                                        puntuacion="{{ $personaje->conducir_automovil }}"
                                        nombre="Conducir automovil" />

                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="w-full">
                    <table class="w-full shadow  bg-gray-800 text-black">
                        <tbody>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="conducir_maquinaria"
                                        puntuacion="{{ $personaje->conducir_maquinaria }}"
                                        nombre="Conducir maquinaria" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="contabilidad"
                                        puntuacion="{{ $personaje->contabilidad }}" nombre="Contabilidad" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="credito" puntuacion="{{ $personaje->credito }}"
                                        nombre="Crédito" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="derecho" puntuacion="{{ $personaje->derecho }}"
                                        nombre="Derecho" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="descubrir"
                                        puntuacion="{{ $personaje->descubrir }}" nombre="Descubrir" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="disfrazarse"
                                        puntuacion="{{ $personaje->disfrazarse }}" nombre="Disfrazarse" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">

                                    <x-habilidad-button habilidad-id="electricidad"
                                        puntuacion="{{ $personaje->electricidad }}" nombre="Electricidad" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="encanto" puntuacion="{{ $personaje->encanto }}"
                                        nombre="Encanto" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">

                                    <x-habilidad-button habilidad-id="equitación"
                                        puntuacion="{{ $personaje->equitación }}" nombre="Equitación" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="escuchar"
                                        puntuacion="{{ $personaje->escuchar }}" nombre="Escuchar" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="esquivar"
                                        puntuacion="{{ $personaje->esquivar }}" nombre="Esquivar" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">

                                    <x-habilidad-button habilidad-id="historia"
                                        puntuacion="{{ $personaje->historia }}" nombre="Historia" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">

                                    <x-habilidad-button habilidad-id="intimidar"
                                        puntuacion="{{ $personaje->intimidar }}" nombre="Intimidar" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">

                                    <x-habilidad-button habilidad-id="juego_de_manos"
                                        puntuacion="{{ $personaje->juego_de_manos }}" nombre="Juego de Manos" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="lanzar" puntuacion="{{ $personaje->lanzar }}"
                                        nombre="Lanzar" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 text-white">
                                    <x-especializacion-block familia="Lengua propia" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Lengua propia')" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 text-white">
                                    <x-especializacion-block familia="Lengua extranjera" :especializaciones="$personaje->especializaciones->where(
                                        'familia.nombre',
                                        'Lengua extranjera',
                                    )" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="mecanica"
                                        puntuacion="{{ $personaje->mecanica }}" nombre="Mecánica" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">

                                    <x-habilidad-button habilidad-id="medicina"
                                        puntuacion="{{ $personaje->medicina }}" nombre="Medicina" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-full">
                    <table class="w-full shadow  bg-gray-800 text-black">
                        <tbody>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="mitos_cthulhu"
                                        puntuacion="{{ $personaje->mitos_cthulhu }}" nombre="Mitos de Cthulhu" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="nadar" puntuacion="{{ $personaje->nadar }}"
                                        nombre="Nadar" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="naturaleza"
                                        puntuacion="{{ $personaje->naturaleza }}" nombre="Naturaleza" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="orientarse"
                                        puntuacion="{{ $personaje->orientarse }}" nombre="Orientarse" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="persuasion"
                                        puntuacion="{{ $personaje->persuasion }}" nombre="Persuasión" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class="px-4 text-white">
                                    <x-especializacion-block familia="Pilotar" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Pilotar')" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">

                                    <x-habilidad-button habilidad-id="primeros_auxilios"
                                        puntuacion="{{ $personaje->primeros_auxilios }}"
                                        nombre="Primeros Auxilios" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="psicoanalisis"
                                        puntuacion="{{ $personaje->psicoanalisis }}" nombre="Psicoanálisis" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="psicologia"
                                        puntuacion="{{ $personaje->psicologia }}" nombre="Psicología" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="saltar" puntuacion="{{ $personaje->saltar }}"
                                        nombre="Saltar" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="seguir_rastros"
                                        puntuacion="{{ $personaje->seguir_rastros }}" nombre="Seguir Rastros" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="sigilo" puntuacion="{{ $personaje->sigilo }}"
                                        nombre="Sigilo" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 text-white">
                                    <x-especializacion-block familia="Supervivencia" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Supervivencia')" />
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td class=" px-4 ">
                                    <x-habilidad-button habilidad-id="trepar" puntuacion="{{ $personaje->trepar }}"
                                        nombre="Trepar" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center mt-6">
            <a href="{{ route('personajes.edit', $personaje) }}"
                class="px-6 py-3 bg-black text-white  shadow-md hover:bg-gray-800 transition duration-200 transform hover:scale-[1.03]">
                Modificar personaje
            </a>
        </div>
        <div class="flex justify-center items-center mt-6">
            <x-primary-button><a href="{{ route('personajes.index') }}">Volver</a></x-primary-button>
        </div>
    </div>

    <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex text-black items-center justify-center">
        <div class="bg-gray-800 p-8  shadow-xl border border-orange-700">
            <form method="POST" action="{{ route('personajes.especializacion', $personaje) }}">
                @csrf
                @method('PUT')
                <h2 class="text-xl font-bold mb-4 text-white">Añadir especializacion</h2>
                <select name="especializacion_id" id="especializacion_id" class="w-full p-2 mb-4">
                    @foreach ($familias as $familia)
                        @if ($familia->nombre === 'Arma de fuego')
                            @foreach ($familia->especializaciones as $especializacion)
                                <option class="text-black" value="{{ $especializacion->id }}">{{ $especializacion->nombre }}
                                </option>
                            @endforeach
                        @endif
                    @endforeach
                </select>
                <div>
                    <button class="bg-green-500 text-white px-4  ">Añadir</button>
            </form>
            <button id="closeModal" type="button" class="bg-red-500 text-white px-4 py-2 ">Cerrar</button>
        </div>
    </div>
    </div>
    <div id="modalModificar" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
        <div class="bg-gray-900 p-8  shadow-xl text-white">
            <form id="formModificarHabilidad" method="POST"
                action="{{ route('personajes.updateHabilidad', $personaje) }}">
                @csrf
                @method('PUT')
                <h2 class="text-xl font-bold mb-4">Modificar </h2>
                <input type="hidden" name="habilidad_id" id="habilidad_id">
                <p id="habilidadNombre" class="font-semibold mb-2"></p>
                <label for="puntuacion" class="block mb-2">Nuevo valor:</label>
                <input type="number" name="puntuacion" id="puntuacion" class="w-full p-2 mb-4" required>
                <div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 ">Modificar</button>
            </form>
            <button id="closeModalModificar" type="button"
                class="bg-red-500 text-white px-4 py-2 ">Cerrar</button>
        </div>
    </div>
    </div>
    <div id="modalModificarEspecializacion"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center w-full">
        <div class="bg-gray-800 p-8  shadow-xl">
            <form id="formModificarEspecializacion" method="POST"
                action="{{ route('personajes.updateEspecializacion', $personaje) }}">
                @csrf
                @method('PUT')
                <h2 class="text-xl font-bold mb-4 text-white">Modificar Especialización</h2>
                <input type="hidden" name="especializacion2_id" id="especializacion2_id">
                <p id="especializacionNombre" class="font-semibold mb-2 text-white"></p>
                <label for="especializacion_puntuacion" class="block mb-2 text-white">Nueva Puntuación:</label>
                <input type="number" name="puntuacion" id="especializacion_puntuacion" class="w-full p-2 mb-4"
                    required>
                <div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 ">Modificar</button>
            </form>
            <button id="closeModalEspecializacion" type="button"
                class="bg-red-500 text-white px-4 py-2 ">Cerrar</button>
        </div>
        <form id="formModificarEspecializacion" method="POST"
            action="{{ route('personajes.desespecializacion', $personaje) }}"
            onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta especialidad?')">
            @csrf
            @method('PUT')
            <input type="hidden" name="especializacion3_id" id="especializacion3_id">
            <button type="danger" class="text-red-700 pt-5">Borrar especialidad</button>
        </form>
    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('modal');
            const closeModal = document.getElementById('closeModal');
            const select = modal.querySelector('select');

            function loadSpecializations(familia) {
                select.innerHTML = '';
                @foreach ($familias as $familia)
                    if (familia === '{{ $familia->nombre }}') {
                        @foreach ($familia->especializaciones as $especializacion)
                            select.innerHTML +=
                                `<option class"text-black" value="{{ $especializacion->id }}">{{ $especializacion->nombre }}</option>`;
                        @endforeach
                    }
                @endforeach
            }

            document.querySelectorAll('button[data-familia]').forEach(button => {
                button.addEventListener('click', function() {
                    const familia = this.getAttribute('data-familia');
                    loadSpecializations(familia);
                    modal.classList.remove('hidden');
                });
            });

            closeModal.addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            // Modal para modificar habilidad
            const modalModificar = document.getElementById('modalModificar');
            const closeModalModificar = document.getElementById('closeModalModificar');
            const formModificarHabilidad = document.getElementById('formModificarHabilidad');
            const habilidadIdInput = document.getElementById('habilidad_id');
            const puntuacionInput = document.getElementById('puntuacion');

            function openModificarModal(habilidadId, puntuacion, nombre) {
                habilidadIdInput.value = habilidadId;
                puntuacionInput.value = puntuacion;
                document.getElementById('habilidadNombre').textContent = ` ${nombre}`;
                modalModificar.classList.remove('hidden');
            }

            document.querySelectorAll('.modificarHabilidadBtn').forEach(button => {
                button.addEventListener('click', function() {
                    const habilidadId = this.getAttribute('data-habilidad-id');
                    const puntuacion = this.getAttribute('data-puntuacion');
                    const nombre = this.getAttribute('data-nombre');
                    openModificarModal(habilidadId, puntuacion, nombre);
                });
            });

            closeModalModificar.addEventListener('click', function() {
                modalModificar.classList.add('hidden');
            });

            const modalModificarEspecializacion = document.getElementById('modalModificarEspecializacion');
            const closeModalEspecializacion = document.getElementById('closeModalEspecializacion');
            const formModificarEspecializacion = document.getElementById('formModificarEspecializacion');
            const especializacionIdInput = document.getElementById('especializacion2_id');
            const especializacionIdInputDelete = document.getElementById('especializacion3_id');

            const puntuacionInputEspecializacion = document.getElementById('especializacion_puntuacion');

            function openModificarEspecializacionModal(especializacionId, puntuacion, nombre) {
                especializacionIdInput.value = especializacionId;
                especializacionIdInputDelete.value = especializacionId;
                puntuacionInputEspecializacion.value = puntuacion;
                document.getElementById('especializacionNombre').textContent = `Especialización: ${nombre}`;
                modalModificarEspecializacion.classList.remove('hidden');
            }

            document.querySelectorAll('.especializacionBtn').forEach(button => {
                button.addEventListener('click', function() {
                    const especializacionId = this.getAttribute('data-especializacion-id');
                    const puntuacion = this.getAttribute('data-especializacion-puntuacion');
                    const nombre = this.getAttribute('data-especializacion-nombre');
                    openModificarEspecializacionModal(especializacionId, puntuacion, nombre);
                });
            });

            closeModalEspecializacion.addEventListener('click', function() {
                modalModificarEspecializacion.classList.add('hidden');
            });

            modalModificarEspecializacion.addEventListener('click', function(event) {
                if (event.target === modalModificarEspecializacion) {
                    modalModificarEspecializacion.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>
