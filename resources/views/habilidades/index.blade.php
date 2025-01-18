<x-app-layout>
    <div class="min-h-screen h-full bg-gray-900 p-2" style="background-image: url('/images/habilidades_fondo.jpeg'); background-size: cover; background-position: center;">
        <div class="w-full max-w-5xl mx-auto p-2 bg-transparent rounded-lg">

            <form method="GET" action="{{ route('habilidades.index') }}" class="mb-4 mt-4">
                <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Buscar habilidades..."
                    class="form-input">
                <x-primary-button>Buscar</x-primary-button>
            </form>


            <!-- Tabla de habilidades -->
            <div class="bg-gradient-to-t from-blue-600 via-blue-700 to-transparent opacity-80 shadow-lg shadow-gray-400/50 rounded-lg p-4 text-white font-semibold">
                <table class="w-full text-white border-collapse">
                    <!-- Encabezados de la tabla -->
                    <thead>
                        <tr class="text-black font-space bg-white font-semibold border-b-4 border-gray-700 text-center">
                            <th class="text-left px-4 py-3 text-xl">Nombre</th>
                            <th class="text-left px-4 py-3 text-xl">Descripción</th>
                            <th class="text-left px-4 py-3 text-xl">Porcentaje de acierto base</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla -->
                    <tbody>
                        @foreach ($habilidades as $habilidad)
                            <tr class=>
                                <td class="pl-4 text-gray-300 font-semibold bg-white">
                                    <a href="{{ route('habilidades.show', $habilidad) }}" class="text-black hover:underline">
                                        {{ $habilidad->nombre }}
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-black bg-white">{{ $habilidad->descripcion }}</td>
                                <td class="px-4 py-3 text-black bg-white">{{ $habilidad->acierto_base }}%</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>




            <!-- Paginación -->
            <div class="mt-8 text-white">
                {{ $habilidades->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
