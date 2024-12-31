<x-app-layout>
    <div class="min-h-screen p-2" style="background-image: url('/images/fondo_libros_1.jpeg'); background-size: cover; background-position: left;">
        <div class="w-full max-w-5xl mx-auto p-2 bg-transparent rounded-lg">
            <form method="GET" action="{{ route('libros.index') }}" class="mb-4">
                <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Buscar libros..."
                    class="form-input">
                <x-primary-button>Buscar</x-primary-button>
            </form>

            <div class="bg-gradient-to-b from-green-200 via-green-300 to-transparent opacity-80 shadow-lg shadow-green-300/50 rounded-lg p-6 text-white font-semibold">
                <table class="w-full text-white border-collapse">
                    <!-- Encabezados de la tabla -->
                    <thead>
                        <tr class="text-black font-space bg-white font-semibold border-b-4 border-gray-700 text-center text-xl">
                            <th class="text-left px-4 py-3">Título</th>
                            <th class="text-left px-4 py-3">Idioma</th>
                            <th class="text-left px-4 py-3">+ Mitos</th>
                            <th class="text-left px-4 py-3">- Cordura</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla -->
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr>
                                <td class="pl-4 text-gray-300 font-semibold bg-white">
                                    <a href="{{ route('libros.show', $libro) }}" class="text-black hover:underline">
                                        {{ $libro->titulo }}
                                    </a>
                                </td>
                                <td class="px-4 py-4 text-black bg-white">{{ $libro->idioma }}</td>
                                <td class="px-4 py-3 text-black bg-white">+{{ $libro->mitos }}%</td>
                                <td class="px-4 py-3 text-black bg-white">-{{ $libro->coste_cordura }} COR</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="mt-8 text-white">
                {{ $libros->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
