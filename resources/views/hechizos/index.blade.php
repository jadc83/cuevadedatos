<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-6" style="background-image: url('/images/cthulhu.jpg'); background-size: cover; background-position: center;">
        <div class="w-full max-w-5xl mx-auto p-6 bg-transparent rounded-lg">
            <main class="bg-transparent">
                <!-- Mensaje de error -->
                @if (session('error'))
                    <div class="mb-6 p-4 text-red-800 rounded-lg bg-red-100 border border-red-300">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Título y buscador -->
                <div class="mb-8">
                    <form method="GET" action="{{ route('hechizos.index') }}" class="mb-4 mt-4">
                        <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Buscar hechizos..." class="form-input">
                        <x-primary-button>Buscar</x-primary-button>
                    </form>
                </div>

                <!-- Tabla de hechizos -->
                <div class="bg-gray-900 p-6 rounded-lg shadow-lg">
                    <table class="w-full text-white border-collapse">
                        <!-- Cabecera de la tabla -->
                        <thead>
                            <tr class="bg-gray-800">
                                <th class="text-left px-4 py-2 text-blue-400">Nombre</th>
                                <th class="text-left px-4 py-2 text-blue-400">Categoría</th>
                            </tr>
                        </thead>
                        <!-- Cuerpo de la tabla -->
                        <tbody>
                            @foreach ($hechizos as $hechizo)
                                <tr class="border-b border-gray-700 hover:bg-gray-700 transition duration-300">
                                    <td class="px-4 py-2 text-gray-300 font-semibold">
                                        <a href="{{ route('hechizos.show', $hechizo) }}" class="hover:text-blue-400">
                                            {{ ucfirst($hechizo->nombre) }}
                                        </a>
                                    </td>
                                    <td class="px-4 py-2 text-gray-300">{{ $hechizo->categoria->nombre }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-8 text-white">
                    {{ $hechizos->links('pagination::tailwind') }}
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
