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
                    <p><strong>Cordura actual:</strong> <span class="flex justify-between w-full">| {{ $personaje->cor }} |</span></p>
                    <p><strong>Cordura máxima:</strong> <span class="flex justify-between w-full">| {{ $personaje->cordura_maxima }} |</span></p>
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
