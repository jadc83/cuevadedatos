<x-app-layout>
    <div class="min-h-screen bg-gray-900"> <!-- Fondo gris oscuro siempre -->
        <div class="max-w-full w-full mx-auto p-6 bg-gray-800 bg-opacity-90 rounded-lg shadow-lg border border-purple-700 table-container"> <!-- Cambié a w-full para el contenedor principal -->
            @if (session('error'))
                <div class="mb-4 p-4 text-red-800 rounded-lg bg-red-100 border border-red-300">
                    <strong>¡Advertencia!</strong>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <h1 class="text-3xl font-bold text-center text-purple-500 mb-6">Hechizos</h1> <!-- Cambié text-green-500 a text-purple-500 -->

            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($hechizos as $hechizo)
                    <a href="{{ route('hechizos.show', $hechizo) }}" class="bg-gray-700 border border-gray-600 rounded-lg p-4 shadow-md w-[90%] md:w-[calc(50%-1rem)] block hover:bg-gray-600 transition duration-200">
                        <div class="text-sm text-gray-300">
                            <div class="flex justify-between items-center">
                                <p>{{ ucfirst($hechizo->nombre) }}</p>
                            </div>
                            <span>Contenido en: {{ $hechizo->libros->pluck('titulo')->implode(', ') }}</span>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="flex justify-center mt-6">
                <a href="{{ route('hechizos.create') }}" class="px-4 py-2 text-white bg-purple-500 hover:bg-purple-600 rounded-lg shadow-md transition duration-200"> <!-- Cambié bg-green-500 a bg-purple-500 y hover:bg-green-600 a hover:bg-purple-600 -->
                    {{ ucwords('Desatar un nuevo poder arcano') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
