<!-- resources/views/personajes/informacion.blade.php -->
<x-app-layout>
    <div class="mx-auto p-4 rounded-lg mt-4 shadow-lg w-full">
        <div class="bg-black p-4 rounded-lg text-white font-semibold">
            <h2 class="text-2xl font-bold text-center mb-4">{{ $personaje->nombre }}</h2>

            <!-- Imagen centrada -->
            <div class="flex justify-center items-center mb-6">
                @if($personaje->foto)
                    <img src="{{ asset('storage/' . $personaje->foto) }}" alt="Foto de {{ $personaje->nombre }}" class="w-48 h-48 rounded-lg">
                @else
                    <p class="text-gray-500">No hay foto disponible</p>
                @endif
            </div>

            <!-- Mostrar los comentarios del personaje -->
            <div class="space-y-4 mt-4">
                @foreach ($personaje->comentarios as $comentario)
                    <!-- Llamamos al componente recursivo para mostrar el comentario y sus respuestas -->
                    <x-comentarios :comentario="$comentario"/>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
