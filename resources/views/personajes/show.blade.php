<x-app-layout>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="max-w-4xl mx-auto p-4 rounded-lg mt-4 shadow-lg">
        <div class="bg-black p-4 rounded-lg text-white font-semibold">
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
                    <p>Información Personal</p>
                    <p><strong>Profesión:</strong> {{ $personaje->profesion }}</p>
                    <p><strong>Edad:</strong> {{ $personaje->edad }}</p>
                    <p><strong>Nacionalidad:</strong> {{ $personaje->nacionalidad }}</p>
                    <p><strong>Estudios:</strong> {{ $personaje->estudios }}</p>
                </div>
                <div>
                    <p>Información Financiera</p>
                    <p><strong>Ingresos:</strong> ${{ $personaje->ingresos }}/año</p>
                    <p><strong>Ahorros:</strong> ${{ $personaje->ahorros }}</p>
                    <p><strong>Efectivo:</strong> ${{ $personaje->efectivo }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                <div>
                    <p>Características Físicas</p>
                    <p><strong>Fuerza:</strong> {{ $personaje->fue }}</p>
                    <p><strong>Constitución:</strong> {{ $personaje->con }}</p>
                    <p><strong>Destreza:</strong> {{ $personaje->des }}</p>
                    <p><strong>Tamaño:</strong> {{ $personaje->tam }}</p>
                    <p><strong>Apariencia:</strong> {{ $personaje->apa }}</p>
                </div>
                <div>
                    <p>Características Mentales</p>
                    <p><strong>Inteligencia:</strong> {{ $personaje->int }}</p>
                    <p><strong>Poder:</strong> {{ $personaje->pod }}</p>
                    <p><strong>Educación:</strong> {{ $personaje->edu }}</p>
                    <p><strong>Cordura actual:</strong> {{ $personaje->cor }}</p>
                    <p><strong>Cordura máxima:</strong> {{ $personaje->cordura_maxima }}</p>
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
