<x-app-layout>
    <div class="min-h-screen bg-gray-900"> <!-- Asegura el fondo gris oscuro en toda la pantalla -->
        <div class="w-full mx-auto p-6 bg-gray-800 bg-opacity-90 rounded-lg shadow-lg border border-green-700">
            <main>
                @if (session()->has('error'))
                    <div class="mb-4 p-4 text-red-800 rounded-lg bg-red-100 border border-red-300">
                        <strong>¡Advertencia!</strong>
                        <span>{{ session()->get('error') }}</span>
                    </div>
                @endif

                <h1 class="text-3xl font-bold text-center text-green-500 mb-6">Cueva de Datos</h1>

                <div class="flex flex-wrap justify-center gap-4">
                    @foreach ($libros as $libro)
                        <a href="{{ route('libros.show', $libro) }}" class="bg-gray-700 border border-gray-600 rounded-lg p-4 shadow-md w-[90%] md:w-[calc(50%-1rem)] block hover:bg-gray-600 transition duration-200">
                            <div class="font-medium text-blue-400 mb-2">{{ $libro->titulo }}</div>
                            <div class="text-sm text-gray-300">
                                <div class="flex justify-between items-center">
                                    <span>Puntuación: {{ $libro->puntuacion }}</span>
                                    <span>+ {{ $libro->mitos }}% Mitos de Cthulhu</span>
                                    <span>Coste de lectura: -{{ $libro->coste_cordura }} COR</span>
                                    <span>Semanas de estudio: {{ $libro->coste_tiempo }}</span>
                                    <span>Año de publicación: {{ $libro->anyo }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $libros->links() }}
                </div>

                <div class="mt-6 text-center">
                    <a href="{{ route('libros.create') }}" class="px-4 py-2 text-white bg-green-500 hover:bg-green-600 rounded-lg shadow-md transition duration-200">Invocar Nuevo Tomo</a>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
