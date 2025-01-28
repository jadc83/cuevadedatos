<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-2"
        style="background-image: url('/images/fondo_personajes.jpeg'); background-size: cover; background-position: center;">
        <main class="bg-transparent w-2/4 rounded-xl mx-auto">
            @if (session('exito'))
                <div class="mb-6 p-4 text-white rounded-lg bg-blue-600">
                    {{ session('exito') }}
                </div>
            @endif

            <div class="mb-2 flex">
                <form method="GET" action="{{ route('personajes.index') }}" class="mb-4">
                    <input type="text" name="busqueda" value="{{ request('busqueda') }}"
                        placeholder="Buscar personajes..." class="form-input">
                    <x-primary-button>Buscar</x-primary-button>
                </form>
            </div>

            <div class="w-full">
                @if ($personajes->isNotEmpty())
                    <table class="min-w-full text-white border-collapse">
                        <thead>
                            <tr
                                class="p-4 text-black text-sm font-space bg-pink-500 font-semibold border-b-4 border-gray-700 text-center uppercase">
                                <th></th>
                                <th>Nombre</th>
                                <th>Profesión</th>
                                <th>Nacionalidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personajes as $personaje)
                                <tr class="text-center">
                                    <td class="text-black bg-white text-xs pl-2 pt-4">
                                        <div class="flex justify-center items-center mb-6">
                                            @if ($personaje->foto)
                                                <img src="{{ asset('storage/' . $personaje->foto) }}"
                                                    alt="Foto de {{ $personaje->nombre }}"
                                                    class="w-32 h-20 object-cover rounded-lg">
                                            @else
                                                <p class="text-gray-500">No hay foto disponible</p>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="pl-4 text-gray-300 font-semibold bg-white text-xs">
                                        <a href="{{ route('personajes.show', $personaje) }}"
                                            class="text-black hover:underline">
                                            {{ $personaje->nombre }}
                                        </a>
                                    </td>

                                    <td class="px-4 py-3 text-black bg-white text-xs">{{ $personaje->profesion }}</td>
                                    <td class="px-4 py-3 text-black bg-white text-xs">{{ $personaje->nacionalidad }}</td>
                                    <td class="px-4 py-3 text-black bg-white text-xs">
                                        <div>
                                        </div>
                                        <div class="flex">
                                            <form class="p-2" action="{{ route('personajes.destroy', $personaje) }}"
                                                method="POST" onsubmit="return confirm('Identificar el cadavér.')">
                                                @csrf
                                                @method('DELETE')
                                                <x-primary-button>Declarar muerto</x-primary-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="bg-white text-black p-6 rounded-lg text-center font-semibold">
                        <p>No se encontraron personajes.</p>
                    </div>
                @endif
            </div>
        </main>
    </div>
</x-app-layout>
