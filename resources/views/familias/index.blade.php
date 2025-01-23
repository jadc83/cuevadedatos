<x-app-layout>
    <div class="min-h-screen h-full bg-gray-900 p-2" style="background-image: url('/images/fondo_objetos.jpeg'); background-size: cover; background-position: center;">
        <div class="w-full max-w-5xl mx-auto p-2 bg-transparent rounded-lg">
            <div class="mt-8 text-center">
                <a href="{{ route('familias.create') }}"
                class="px-6 py-3 text-white bg-green-500 hover:bg-green-600 rounded-lg shadow-md font-bold focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-200">
                    Crear familia
                </a>
            </div>
            <div class="bg-gradient-to-t from-gray-600 via-gray-700 to-transparent opacity-80 shadow-lg shadow-gray-400/50 rounded-lg p-4 text-white font-semibold">
                <table class="w-full text-white border-collapse">
                    <thead>
                        <tr class="text-black font-space bg-white font-semibold border-b-4 border-gray-700 text-center">
                            <th class="text-left px-4 py-3 text-xl">Nombre</th>
                            <th class="text-left px-4 py-3 text-xl">Base</th>
                            <th class="text-left px-4 py-3 text-xl">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($familias as $familia)
                            <tr>
                                <td class="pl-4 text-black font-semibold bg-white">
                                    <p>
                                        {{ $familia->nombre }}
                                    </p>
                                </td>
                                <td class="px-4 py-3 text-black bg-white">{{ $familia->base }}%</td>
                                <td class="px-4 py-3 text-black bg-white">
                                    <a href="{{ route('familias.edit', $familia) }}" class="px-4 py-3 text-black bg-white">Editar</a>
                                    <form method="POST" action="{{ route('familias.destroy', $familia) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-6 py-3 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-500 transition duration-200 transform hover:scale-[1.03]">
                                            Borrar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-8 text-white">
                {{ $familias->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>
