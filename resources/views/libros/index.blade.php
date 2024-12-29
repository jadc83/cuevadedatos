<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-6" style="background-image: url('/images/cthulhu.jpg'); background-size: cover; background-position: center;">
        <div class="w-full max-w-5xl mx-auto p-6 bg-transparent rounded-lg">
            <form method="GET" action="{{ route('libros.index') }}" class="mb-4 mt-4">
                <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Buscar libros..."
                    class="form-input">
                <x-primary-button>Buscar</x-primary-button>
            </form>

            <div class="bg-gray-900 p-6 rounded-lg shadow-lg">
                <table class="w-full text-white border-collapse">
                    <!-- Cabecera de la tabla -->
                    <thead>
                        <tr class="bg-gray-800">
                            <th class="text-left px-4 py-2 text-blue-400">Título</th>
                            <th class="text-left px-4 py-2 text-blue-400">Mitos</th>
                            <th class="text-left px-4 py-2 text-blue-400">Coste de Cordura</th>
                            <th class="text-left px-4 py-2 text-blue-400">Idioma</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla -->
                    <tbody>
                        @foreach ($libros as $libro)
                            <tr class="border-b border-gray-700 hover:bg-gray-700 transition duration-300">
                                <td class="px-4 py-2 text-gray-300 font-semibold">
                                    <a href="{{ route('libros.show', $libro) }}" class="hover:text-blue-400">
                                        {{ $libro->titulo }}
                                    </a>
                                </td>
                                <td class="px-4 py-2 text-gray-300">+{{ $libro->mitos }}%</td>
                                <td class="px-4 py-2 text-red-400">-{{ $libro->coste_cordura }} COR</td>
                                <td class="px-4 py-2 text-green-400">{{ $libro->idioma }}</td>
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
