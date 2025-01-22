<x-app-layout>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class=" max-w-4xl mx-auto p-4 rounded-lg mt-4 shadow-lg">
        <div class="bg-black p-4 px-12 rounded-lg text-white font-semibold">
            <h2 class="text-2xl font-bold text-center mb-4">{{ $personaje->nombre }}</h2>

            <!-- Imagen centrada -->
            <div class="flex justify-center items-center mb-6">
                @if($personaje->foto)
                    <img class="w-44 h-48 rounded-lg" src="{{ asset('storage/' . $personaje->foto) }}" alt="Foto de {{ $personaje->nombre }}" >
                @else
                    <p class="text-gray-500">No hay foto disponible</p>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <strong class="underline">Información Personal</strong>
                    <p><strong>Profesión:</strong> {{ $personaje->profesion }}</p>
                    <p><strong>Edad:</strong> {{ $personaje->edad }}</p>
                    <p><strong>Nacionalidad:</strong> {{ $personaje->nacionalidad }}</p>
                    <p><strong>Estudios:</strong> {{ $personaje->estudios }}</p>
                </div>
                <div>
                    <strong class="underline">Información Financiera</strong>
                    <p><strong>Ingresos:</strong> ${{ $personaje->ingresos }}/año</p>
                    <p><strong>Ahorros:</strong> ${{ $personaje->ahorros }}</p>
                    <p><strong>Efectivo:</strong> ${{ $personaje->efectivo }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                <div>
                    <strong class="underline">Características Físicas</strong>
                    <p><strong>Fuerza:</strong> <span class="flex justify-between w-full">| {{ ($personaje->fue) }} | {{ floor($personaje->fue/2) }} | {{ floor($personaje->fue/5) }} |</span></p>
                    <p><strong>Constitución:</strong> <span class="flex justify-between w-full">| {{ floor($personaje->con) }} | {{ floor($personaje->con/2) }} | {{ floor($personaje->con/5) }} |</span></p>
                    <p><strong>Destreza:</strong> <span class="flex justify-between w-full">| {{ ($personaje->des) }} | {{ floor($personaje->des/2) }} | {{ floor($personaje->des/5) }} |</span></p>
                    <p><strong>Tamaño:</strong> <span class="flex justify-between w-full">| {{ ($personaje->tam) }} | {{ floor($personaje->tam/2) }} | {{ floor($personaje->tam/5) }} |</span></p>
                    <p><strong>Apariencia:</strong> <span class="flex justify-between w-full">| {{ ($personaje->apa) }} | {{ floor($personaje->apa/2) }} | {{ floor($personaje->apa/5) }} |</span></p>
                </div>
                <div>
                    <strong class="underline">Características Mentales</strong>
                    <p><strong>Inteligencia:</strong> <span class="flex justify-between w-full">| {{ ($personaje->int) }} | {{ floor($personaje->int/2) }} | {{ floor($personaje->int/5) }} |</span></p>
                    <p><strong>Poder:</strong> <span class="flex justify-between w-full">| {{ ($personaje->pod) }} | {{ floor($personaje->pod/2) }} | {{ floor($personaje->pod/5) }} |</span></p>
                    <p><strong>Educación:</strong> <span class="flex justify-between w-full">| {{ ($personaje->edu) }} | {{ floor($personaje->edu/2) }} | {{ floor($personaje->edu/5) }} |</span></p>
                    <p><strong>Cordura actual:</strong> <span class="flex justify-between w-full">| {{ $personaje->cor_actual }} |</span></p>
                    <p><strong>Cordura inicial:</strong> <span class="flex justify-between w-full">| {{ $personaje->cor }} |</span></p>
                    <p><strong>Cordura máxima:</strong> <span class="flex justify-between w-full">| {{ 99 - $personaje->mitos_cthulhu }} |</span></p>
                </div>
            </div>
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold" >Habilidades</h2>
                <a href="{{ route('personajes.editHabilidades', $personaje) }}"
                    class="px-6 py-3 bg-white text-black rounded-lg shadow-md hover:bg-green-500 transition duration-200 transform hover:scale-[1.03]">
                    Modificar Habilidades
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                    <div>
                        <p><strong>Antropología:</strong> <span class="flex justify-between w-full">| {{ $personaje->antropologia }} | {{ floor($personaje->antropologia / 2) }} | {{ floor($personaje->antropologia / 5) }} |</span></p>
                        <p><strong>Armas de fuego:</strong>
                        <p><strong>Arqueología:</strong> <span class="flex justify-between w-full">| {{ $personaje->arqueologia }} | {{ floor($personaje->arqueologia / 2) }} | {{ floor($personaje->arqueologia / 5) }} |</span></p>
                        <p><strong>Arte/Artesanía:</strong>
                        <p><strong>Buscar libros:</strong> <span class="flex justify-between w-full">| {{ $personaje->buscar_libros }} | {{ floor($personaje->buscar_libros / 2) }} | {{ floor($personaje->buscar_libros / 5) }} |</span></p>
                        <p><strong>Cerrajería:</strong> <span class="flex justify-between w-full">| {{ $personaje->cerrajeria }} | {{ floor($personaje->cerrajeria / 2) }} | {{ floor($personaje->cerrajeria / 5) }} |</span></p>
                        <p><strong>Charlatanería:</strong> <span class="flex justify-between w-full">| {{ $personaje->charlataneria }} | {{ floor($personaje->charlataneria / 2) }} | {{ floor($personaje->charlataneria / 5) }} |</span></p>
                        <p><strong>Ciencia:</strong>
                        <p><strong>Ciencias Ocultas:</strong> <span class="flex justify-between w-full">| {{ $personaje->ciencias_ocultas }} | {{ floor($personaje->ciencias_ocultas / 2) }} | {{ floor($personaje->ciencias_ocultas / 5) }} |</span></p>
                        <p><strong>Pelea:</strong>
                        <p><strong>Conducir Automóvil:</strong> <span class="flex justify-between w-full">| {{ $personaje->conducir_automovil }} | {{ floor($personaje->conducir_automovil / 2) }} | {{ floor($personaje->conducir_automovil / 5) }} |</span></p>
                    </div>
                    <div>
                        <p><strong>Conducir Maquinaria:</strong> <span class="flex justify-between w-full">| {{ $personaje->conducir_maquinaria }} | {{ floor($personaje->conducir_maquinaria / 2) }} | {{ floor($personaje->conducir_maquinaria / 5) }} |</span></p>
                        <p><strong>Contabilidad:</strong> <span class="flex justify-between w-full">| {{ $personaje->contabilidad }} | {{ floor($personaje->contabilidad / 2) }} | {{ floor($personaje->contabilidad / 5) }} |</span></p>
                        <p><strong>Crédito:</strong> <span class="flex justify-between w-full">| {{ $personaje->credito }} | {{ floor($personaje->credito / 2) }} | {{ floor($personaje->credito / 5) }} |</span></p>
                        <p><strong>Derecho:</strong> <span class="flex justify-between w-full">| {{ $personaje->derecho }} | {{ floor($personaje->derecho / 2) }} | {{ floor($personaje->derecho / 5) }} |</span></p>
                        <p><strong>Descubrir:</strong> <span class="flex justify-between w-full">| {{ $personaje->descubrir }} | {{ floor($personaje->descubrir / 2) }} | {{ floor($personaje->descubrir / 5) }} |</span></p>
                        <p><strong>Disfrazarse:</strong> <span class="flex justify-between w-full">| {{ $personaje->disfrazarse }} | {{ floor($personaje->disfrazarse / 2) }} | {{ floor($personaje->disfrazarse / 5) }} |</span></p>
                        <p><strong>Electricidad:</strong> <span class="flex justify-between w-full">| {{ $personaje->electricidad }} | {{ floor($personaje->electricidad / 2) }} | {{ floor($personaje->electricidad / 5) }} |</span></p>
                        <p><strong>Encanto:</strong> <span class="flex justify-between w-full">| {{ $personaje->encanto }} | {{ floor($personaje->encanto / 2) }} | {{ floor($personaje->encanto / 5) }} |</span></p>
                        <p><strong>Equitación:</strong> <span class="flex justify-between w-full">| {{ $personaje->equitación }} | {{ floor($personaje->equitación / 2) }} | {{ floor($personaje->equitación / 5) }} |</span></p>
                        <p><strong>Escuchar:</strong> <span class="flex justify-between w-full">| {{ $personaje->escuchar }} | {{ floor($personaje->escuchar / 2) }} | {{ floor($personaje->escuchar / 5) }} |</span></p>
                        <p><strong>Esquivar:</strong> <span class="flex justify-between w-full">| {{ $personaje->esquivar }} | {{ floor($personaje->esquivar / 2) }} | {{ floor($personaje->esquivar / 5) }} |</span></p>
                        <p><strong>Historia:</strong> <span class="flex justify-between w-full">| {{ $personaje->historia }} | {{ floor($personaje->historia / 2) }} | {{ floor($personaje->historia / 5) }} |</span></p>
                        <p><strong>Intimidar:</strong> <span class="flex justify-between w-full">| {{ $personaje->intimidar }} | {{ floor($personaje->intimidar / 2) }} | {{ floor($personaje->intimidar / 5) }} |</span></p>
                        <p><strong>Juego de Manos:</strong> <span class="flex justify-between w-full">| {{ $personaje->juego_de_manos }} | {{ floor($personaje->juego_de_manos / 2) }} | {{ floor($personaje->juego_de_manos / 5) }} |</span></p>
                        <p><strong>Lanzar:</strong> <span class="flex justify-between w-full">| {{ $personaje->lanzar }} | {{ floor($personaje->lanzar / 2) }} | {{ floor($personaje->lanzar / 5) }} |</span></p>
                        <p><strong>Lengua propia:</strong>
                        <p><strong>Otras lenguas:</strong>
                        <p><strong>Mecánica:</strong> <span class="flex justify-between w-full">| {{ $personaje->mecanica }} | {{ floor($personaje->mecanica / 2) }} | {{ floor($personaje->mecanica / 5) }} |</span></p>
                        <p><strong>Medicina:</strong> <span class="flex justify-between w-full">| {{ $personaje->medicina }} | {{ floor($personaje->medicina / 2) }} | {{ floor($personaje->medicina / 5) }} |</span></p>
                    </div>
                    <div>
                        <p><strong>Mitos de Cthulhu:</strong> <span class="flex justify-between w-full">| {{ $personaje->mitos_cthulhu }} | {{ floor($personaje->mitos_cthulhu / 2) }} | {{ floor($personaje->mitos_cthulhu / 5) }} |</span></p>
                        <p><strong>Nadar:</strong> <span class="flex justify-between w-full">| {{ $personaje->nadar }} | {{ floor($personaje->nadar / 2) }} | {{ floor($personaje->nadar / 5) }} |</span></p>
                        <p><strong>Naturaleza:</strong> <span class="flex justify-between w-full">| {{ $personaje->naturaleza }} | {{ floor($personaje->naturaleza / 2) }} | {{ floor($personaje->naturaleza / 5) }} |</span></p>
                        <p><strong>Orientarse:</strong> <span class="flex justify-between w-full">| {{ $personaje->orientarse }} | {{ floor($personaje->orientarse / 2) }} | {{ floor($personaje->orientarse / 5) }} |</span></p>
                        <p><strong>Persuasión:</strong> <span class="flex justify-between w-full">| {{ $personaje->persuasion }} | {{ floor($personaje->persuasion / 2) }} | {{ floor($personaje->persuasion / 5) }} |</span></p>
                        <p><strong>Pilotar:</strong>
                        <p><strong>Primeros Auxilios:</strong> <span class="flex justify-between w-full">| {{ $personaje->primeros_auxilios }} | {{ floor($personaje->primeros_auxilios / 2) }} | {{ floor($personaje->primeros_auxilios / 5) }} |</span></p>
                        <p><strong>Psicoanálisis:</strong> <span class="flex justify-between w-full">| {{ $personaje->psicoanalisis }} | {{ floor($personaje->psicoanalisis / 2) }} | {{ floor($personaje->psicoanalisis / 5) }} |</span></p>
                        <p><strong>Psicología:</strong> <span class="flex justify-between w-full">| {{ $personaje->psicologia }} | {{ floor($personaje->psicologia / 2) }} | {{ floor($personaje->psicologia / 5) }} |</span></p>
                        <p><strong>Saltar:</strong> <span class="flex justify-between w-full">| {{ $personaje->saltar }} | {{ floor($personaje->saltar / 2) }} | {{ floor($personaje->saltar / 5) }} |</span></p>
                        <p><strong>Seguir Rastros:</strong> <span class="flex justify-between w-full">| {{ $personaje->seguir_rastros }} | {{ floor($personaje->seguir_rastros / 2) }} | {{ floor($personaje->seguir_rastros / 5) }} |</span></p>
                        <p><strong>Sigilo:</strong> <span class="flex justify-between w-full">| {{ $personaje->sigilo }} | {{ floor($personaje->sigilo / 2) }} | {{ floor($personaje->sigilo / 5) }} |</span></p>
                        <p><strong>Supervivencia:</strong>
                        <p><strong>Trepar:</strong> <span class="flex justify-between w-full">| {{ $personaje->trepar }} | {{ floor($personaje->trepar / 2) }} | {{ floor($personaje->trepar / 5) }} |</span></p>
                    </div>
            </div>
            <div class="flex justify-center items-center mt-6">
                <a href="{{ route('personajes.edit', $personaje) }}" class="px-6 py-3 bg-black text-white rounded-lg shadow-md hover:bg-gray-800 transition duration-200 transform hover:scale-[1.03]">
                    Modificar personaje
                </a>
            </div>
        </div>

        <div class="flex justify-center items-center mt-6">
            <x-primary-button><a href="{{ route('personajes.index') }}">Volver</a></x-primary-button>
        </div>
    </div>

</x-app-layout>
