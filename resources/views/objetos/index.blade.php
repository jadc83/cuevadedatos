<x-app-layout>
    <div class="max-h-screen h-[47.6em] bg-gray-900 p-2" style="background-image: url('/images/fondo_objetos.jpeg'); background-size: cover; background-position: center;">
        <div class="w-full max-w-5xl mx-auto p-2 bg-transparent rounded-lg">

            <form method="GET" action="{{ route('objetos.index') }}" class="mb-4 mt-4">
                <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Buscar objetos..."
                    class="form-input">
                <x-primary-button>Buscar</x-primary-button>
            </form>


            <!-- Tabla de objetos -->
            <div class="bg-gradient-to-t from-gray-600 via-gray-700 to-transparent opacity-80 shadow-lg shadow-gray-400/50 rounded-lg p-4 text-white font-semibold">
                <table class="w-full text-white border-collapse">
                    <!-- Encabezados de la tabla -->
                    <thead>
                        <tr class="text-black font-space bg-white font-semibold border-b-4 border-gray-700 text-center">
                            <th class="text-left px-4 py-3 text-xl">Denominación</th>
                            <th class="text-left px-4 py-3 text-xl">Valor</th>
                        </tr>
                    </thead>
                    <!-- Cuerpo de la tabla -->
                    <tbody>
                        @foreach ($objetos as $objeto)
                            <tr>
                                <td class="pl-4 text-gray-300 font-semibold bg-white">
                                    <a href="{{ route('objetos.show', $objeto) }}" class="text-black hover:underline">
                                        {{ $objeto->denominacion }}
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-black bg-white">${{ $objeto->valor }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>




            <!-- Paginación -->
            <div class="mt-8 text-white">
                {{ $objetos->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
