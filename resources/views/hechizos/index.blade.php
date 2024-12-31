<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-2" style="background-image: url('/images/fondo_hechizos.jpeg'); background-size: cover; background-position: center;">
        <div class="w-full max-w-5xl mx-auto p-6 bg-transparent rounded-lg">
            <main class="bg-transparent">

                @if (session('exito'))
                    <div class="mb-6 p-4 text-white rounded-lg bg-blue-600">
                        {{ session('exito') }}
                    </div>
                @endif

                <!-- Título y buscador -->
                <div class="mb-2">
                    <form method="GET" action="{{ route('hechizos.index') }}" class="mb-4">
                        <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Buscar hechizos..." class="form-input">
                        <x-primary-button>Buscar</x-primary-button>
                    </form>
                </div>

                <!-- Tabla de hechizos -->
                <div class="bg-gradient-to-t from-orange-600 via-orange-700 to-transparent opacity-80 shadow-lg shadow-orange-400/50 rounded-lg p-6 text-white font-semibold">
                    <table class="w-full text-white border-collapse">
                        <!-- Encabezados de la tabla -->
                        <thead>
                            <tr class="text-black bg-white font-semibold border-b-4 border-gray-700 text-center">
                                <th class="text-left px-4 py-3">Nombre</th>
                                <th class="text-left px-4 py-3">Categoria</th>
                            </tr>
                        </thead>
                        <!-- Cuerpo de la tabla -->
                        <tbody>
                            @foreach ($hechizos as $hechizo)
                                <tr>
                                    <td class="pl-4 text-gray-300 font-semibold bg-white">
                                        <a href="{{ route('hechizos.show', $hechizo) }}" class="text-black hover:underline">
                                            {{ $hechizo->nombre }}
                                        </a>
                                    </td>
                                    <td class="px-4 py-4 text-black bg-white">{{ $hechizo->nombre }}</td>
                                    <td class="px-4 py-3 text-black bg-white">{{ $hechizo->categoria->nombre }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginación -->
                <div class="mt-8">
                    {{ $hechizos->links('pagination::tailwind') }}
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
