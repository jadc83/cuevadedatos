<x-app-layout>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="min-h-screen bg-gray-900 p-6">
        <div class="w-2/4 mx-auto bg-gray-800 px-12 rounded-lg text-white font-semibold">
            <h2 class="text-2xl font-bold text-center mb-4 py-5">{{ $personaje->nombre }}</h2>

            <div class="flex justify-center items-center">
                @if ($personaje->foto)
                    <img class="w-44 h-48 rounded-lg" src="{{ asset('storage/' . $personaje->foto) }}"
                        alt="Foto de {{ $personaje->nombre }}">
                @else
                    <p class="text-gray-500">No hay foto disponible</p>
                @endif
            </div>
            <div class="text-center">
                <p><strong>Jugador:</strong> {{ $personaje->user->name }}</p>
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
                <table class="border border-gray-300 border-collapse w-full shadow-lg rounded-lg bg-orange-500">
                    <thead class="bg-gray-200 text-black">
                        <tr >
                            <th class="border border-gray-300 px-4 py-2">Profesión</th>
                            <th class="border border-gray-300 px-4 py-2">Nacionalidad</th>
                            <th class="border border-gray-300 px-4 py-2">Estudios</th>
                            <th class="border border-gray-300 px-4 py-2">Edad</th>
                            <th class="border border-gray-300 px-4 py-2">Ingresos</th>
                            <th class="border border-gray-300 px-4 py-2">Ahorros</th>
                            <th class="border border-gray-300 px-4 py-2">Efectivo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="border border-gray-300 px-4 py-2">{{ $personaje->profesion }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $personaje->nacionalidad }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $personaje->estudios }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $personaje->edad }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded modificarHabilidadBtn"
                                    data-habilidad-id="{{ 'ingresos' }}"
                                    data-puntuacion="{{ $personaje->ingresos }}"
                                    data-nombre="{{ 'Ingresos' }}">
                                    ${{ $personaje->ingresos }}
                                </button>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded modificarHabilidadBtn"
                                    data-habilidad-id="{{ 'ahorros' }}"
                                    data-puntuacion="{{ $personaje->ahorros }}"
                                    data-nombre="{{ 'Ahorro' }}">
                                    ${{ $personaje->ahorros }}
                                </button>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded modificarHabilidadBtn"
                                    data-habilidad-id="{{ 'efectivo' }}"
                                    data-puntuacion="{{ $personaje->efectivo }}"
                                    data-nombre="{{ 'Efectivo' }}">
                                    ${{ $personaje->efectivo }}
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="grid grid-cols-1 cols-2 gap-6 text-center mt-4">
                <!--Estadisticas base -->
                <table class="border border-gray-300 border-collapse w-full shadow-lg rounded-lg bg-indigo-500">
                    <thead class="bg-gray-200 text-black">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">HP</th>
                            <th class="border border-gray-300 px-4 py-2">MaxHP</th>
                            <th class="border border-gray-300 px-4 py-2">MP</th>
                            <th class="border border-gray-300 px-4 py-2">MaxMP</th>
                            <th class="border border-gray-300 px-4 py-2">Suerte</th>
                            <th class="border border-gray-300 px-4 py-2">Cordura inicial</th>
                            <th class="border border-gray-300 px-4 py-2">Cordura</th>
                            <th class="border border-gray-300 px-4 py-2">MaxCOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-single habilidad-id="hp" puntuacion="{{ $personaje->hp }}" nombre="Vida actual" />
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ floor(($personaje->con / 5 + $personaje->tam / 5) / 2) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-single habilidad-id="mp" puntuacion="{{ $personaje->mp }}" nombre="Magia alctual" />
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ floor($personaje->pod / 5) }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{$personaje->sue}}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-single habilidad-id="cor" puntuacion="{{ $personaje->cor }}" nombre="Cordura inicial" />
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-single habilidad-id="cor_actual" puntuacion="{{ $personaje->cor_actual }}" nombre="Cordura actual" />
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ 99 - $personaje->mitos_cthulhu }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="grid grid-cols-1  gap-6 mt-4">
                <table class="w-full bg-white  text-black shadow-lg rounded-lg text-center mx-auto">
                    <tbody>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-button habilidad-id="fue" puntuacion="{{ $personaje->fue }}" nombre="FUE" />
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-button habilidad-id="con" puntuacion="{{ $personaje->con }}" nombre="CON" />
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-button habilidad-id="des" puntuacion="{{ $personaje->des }}" nombre="DES" />
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-button habilidad-id="tam" puntuacion="{{ $personaje->tam }}" nombre="TAM" />
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-button habilidad-id="apa" puntuacion="{{ $personaje->apa }}" nombre="APA" />
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-button habilidad-id="int" puntuacion="{{ $personaje->int }}" nombre="INT" />
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-button habilidad-id="pod" puntuacion="{{ $personaje->pod }}" nombre="POD" />
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-button habilidad-id="edu" puntuacion="{{ $personaje->edu }}" nombre="EDU" />
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <x-habilidad-button habilidad-id="mov" puntuacion="Soon" nombre="MOV" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h2 class="text-2xl font-bold text-center">Habilidades</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                <div class="text-center flex flex-col items-center space-y-2">
                    <x-habilidad-button habilidad-id="antropologia" puntuacion="{{ $personaje->antropologia }}"
                        nombre="Antropología" />
                    <x-especializacion-block familia="Armas de fuego" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Armas de fuego')" />
                    <x-habilidad-button habilidad-id="arqueologia" puntuacion="{{ $personaje->arqueologia }}"
                        nombre="Arqueologia" />
                    <x-especializacion-block familia="Arte/Artesania" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Arte/Artesania')" />

                    <x-habilidad-button habilidad-id="cerrajeria" puntuacion="{{ $personaje->cerrajeria }}"
                        nombre="Cerrajeria" />
                    <x-habilidad-button habilidad-id="charlataneria" puntuacion="{{ $personaje->charlataneria }}"
                        nombre="Charlataneria" />

                    <x-habilidad-button habilidad-id="charlataneria" puntuacion="{{ $personaje->charlataneria }}"
                        nombre="Charlatanería" />
                    <x-especializacion-block familia="Ciencia" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Ciencia')" />
                    <x-habilidad-button habilidad-id="ciencias_ocultas" puntuacion="{{ $personaje->ciencias_ocultas }}"
                        nombre="Ciencias ocultas" />

                    <x-especializacion-block familia="Combatir" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Combatir')" />
                    <x-habilidad-button habilidad-id="conducir_automovil"
                        puntuacion="{{ $personaje->conducir_automovil }}" nombre="Conducir automovil" />

                </div>
                <div class="text-center flex flex-col items-center space-y-2">
                    <x-habilidad-button habilidad-id="conducir_maquinaria"
                        puntuacion="{{ $personaje->conducir_maquinaria }}" nombre="Conducir maquinaria" />
                    <x-habilidad-button habilidad-id="contabilidad" puntuacion="{{ $personaje->contabilidad }}"
                        nombre="Contabilidad" />
                    <x-habilidad-button habilidad-id="credito" puntuacion="{{ $personaje->credito }}"
                        nombre="Crédito" />
                    <x-habilidad-button habilidad-id="derecho" puntuacion="{{ $personaje->derecho }}"
                        nombre="Derecho" />
                    <x-habilidad-button habilidad-id="descubrir" puntuacion="{{ $personaje->descubrir }}"
                        nombre="Descubrir" />
                    <x-habilidad-button habilidad-id="disfrazarse" puntuacion="{{ $personaje->disfrazarse }}"
                        nombre="Disfrazarse" />
                    <x-habilidad-button habilidad-id="electricidad" puntuacion="{{ $personaje->electricidad }}"
                        nombre="Electricidad" />
                    <x-habilidad-button habilidad-id="encanto" puntuacion="{{ $personaje->encanto }}"
                        nombre="Encanto" />
                    <x-habilidad-button habilidad-id="equitación" puntuacion="{{ $personaje->equitación }}"
                        nombre="Equitación" />
                    <x-habilidad-button habilidad-id="escuchar" puntuacion="{{ $personaje->escuchar }}"
                        nombre="Escuchar" />
                    <x-habilidad-button habilidad-id="esquivar" puntuacion="{{ $personaje->esquivar }}"
                        nombre="Esquivar" />
                    <x-habilidad-button habilidad-id="historia" puntuacion="{{ $personaje->historia }}"
                        nombre="Historia" />
                    <x-habilidad-button habilidad-id="intimidar" puntuacion="{{ $personaje->intimidar }}"
                        nombre="Intimidar" />
                    <x-habilidad-button habilidad-id="juego_de_manos" puntuacion="{{ $personaje->juego_de_manos }}"
                        nombre="Juego de Manos" />
                    <x-habilidad-button habilidad-id="lanzar" puntuacion="{{ $personaje->lanzar }}"
                        nombre="Lanzar" />
                    <x-especializacion-block familia="Lengua propia" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Lengua propia')" />
                    <x-especializacion-block familia="Lengua extranjera" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Lengua extranjera')" />
                    <x-habilidad-button habilidad-id="mecanica" puntuacion="{{ $personaje->mecanica }}"
                        nombre="Mecánica" />
                    <x-habilidad-button habilidad-id="medicina" puntuacion="{{ $personaje->medicina }}"
                        nombre="Medicina" />
                </div>
                <div class="text-center flex flex-col items-center space-y-2">
                    <x-habilidad-button habilidad-id="mitos_cthulhu" puntuacion="{{ $personaje->mitos_cthulhu }}"
                        nombre="Mitos de Cthulhu" />
                    <x-habilidad-button habilidad-id="nadar" puntuacion="{{ $personaje->nadar }}" nombre="Nadar" />
                    <x-habilidad-button habilidad-id="naturaleza" puntuacion="{{ $personaje->naturaleza }}"
                        nombre="Naturaleza" />
                    <x-habilidad-button habilidad-id="orientarse" puntuacion="{{ $personaje->orientarse }}"
                        nombre="Orientarse" />
                    <x-habilidad-button habilidad-id="persuasion" puntuacion="{{ $personaje->persuasion }}"
                        nombre="Persuasión" />
                    <x-especializacion-block familia="Pilotar" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Pilotar')" />
                    <x-habilidad-button habilidad-id="primeros_auxilios"
                        puntuacion="{{ $personaje->primeros_auxilios }}" nombre="Primeros Auxilios" />
                    <x-habilidad-button habilidad-id="psicoanalisis" puntuacion="{{ $personaje->psicoanalisis }}"
                        nombre="Psicoanálisis" />
                    <x-habilidad-button habilidad-id="psicologia" puntuacion="{{ $personaje->psicologia }}"
                        nombre="Psicología" />
                    <x-habilidad-button habilidad-id="saltar" puntuacion="{{ $personaje->saltar }}"
                        nombre="Saltar" />
                    <x-habilidad-button habilidad-id="seguir_rastros" puntuacion="{{ $personaje->seguir_rastros }}"
                        nombre="Seguir Rastros" />
                    <x-habilidad-button habilidad-id="sigilo" puntuacion="{{ $personaje->sigilo }}"
                        nombre="Sigilo" />
                    <x-especializacion-block familia="Supervivencia" :especializaciones="$personaje->especializaciones->where('familia.nombre', 'Supervivencia')" />

                    <x-habilidad-button habilidad-id="trepar" puntuacion="{{ $personaje->trepar }}"
                        nombre="Trepar" />
                </div>
            </div>
            <div class="flex justify-center items-center mt-6">
                <a href="{{ route('personajes.edit', $personaje) }}"
                    class="px-6 py-3 bg-black text-white rounded-lg shadow-md hover:bg-gray-800 transition duration-200 transform hover:scale-[1.03]">
                    Modificar personaje
                </a>
            </div>
        </div>

        <div class="flex justify-center items-center mt-6">
            <x-primary-button><a href="{{ route('personajes.index') }}">Volver</a></x-primary-button>
        </div>
        <div id="modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-xl">
                <form method="POST" action="{{ route('personajes.especializacion', $personaje) }}">
                    @csrf
                    @method('PUT')
                    <h2 class="text-xl font-bold mb-4">Añadir especializacion</h2>
                    <select name="especializacion_id" id="especializacion_id" class="w-full p-2 mb-4">
                        @foreach ($familias as $familia)
                            @if ($familia->nombre === 'Arma de fuego')
                                @foreach ($familia->especializaciones as $especializacion)
                                    <option value="{{ $especializacion->id }}">{{ $especializacion->nombre }}
                                    </option>
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                    <div>
                        <button class="bg-green-500 text-white px-4 py-2 rounded">Añadir</button>
                </form>
                <button id="closeModal" type="button" class="bg-red-500 text-white px-4 py-2 rounded">Cerrar</button>
            </div>
        </div>
    </div>
    <div id="modalModificar" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-xl">
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
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Modificar</button>
            </form>
            <button id="closeModalModificar" type="button" class="bg-red-500 text-white px-4 py-2 rounded">Cerrar</button>
        </div>
    </div>
    </div>
    <div id="modalModificarEspecializacion"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-xl">
            <form id="formModificarEspecializacion" method="POST"
                action="{{ route('personajes.updateEspecializacion', $personaje) }}">
                @csrf
                @method('PUT')
                <h2 class="text-xl font-bold mb-4">Modificar Especialización</h2>
                <input type="hidden" name="especializacion2_id" id="especializacion2_id">
                <p id="especializacionNombre" class="font-semibold mb-2"></p>
                <label for="especializacion_puntuacion" class="block mb-2">Nueva Puntuación:</label>
                <input type="number" name="puntuacion" id="especializacion_puntuacion" class="w-full p-2 mb-4"
                    required>
                <div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Modificar</button>
            </form>
            <button id="closeModalEspecializacion" type="button" class="bg-red-500 text-white px-4 py-2 rounded">Cerrar</button>
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
                                `<option value="{{ $especializacion->id }}">{{ $especializacion->nombre }}</option>`;
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
