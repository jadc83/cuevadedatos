<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-2" style="background-image: url('/images/fondo_personajes.jpeg'); background-size: cover; background-position: center;">
            <main class="bg-transparent w-2/4 rounded-xl mx-auto">
                @if (session('exito'))
                    <div class="mb-6 p-4 text-white rounded-lg bg-blue-600">
                        {{ session('exito') }}
                    </div>
                @endif

                <!-- Título y buscador -->
                <div class="mb-2">
                    <form method="GET" action="{{ route('personajes.index') }}" class="mb-4">
                        <input type="text" name="busqueda" value="{{ request('busqueda') }}" placeholder="Buscar personajes..." class="form-input">
                        <x-primary-button>Buscar</x-primary-button>
                    </form>
                </div>

                <!-- Tabla de personajes -->
                    <div class="w-full">
                        <table class="min-w-full text-white border-collapse">
                            <!-- Encabezados de la tabla -->
                            <thead>
                                <tr class="p-4 text-black text-sm font-space bg-pink-500 font-semibold border-b-4 border-gray-700 text-center uppercase">
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Profesión</th>
                                    <th>Nacionalidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <!-- Cuerpo de la tabla -->
                            <tbody>
                                @foreach ($personajes as $personaje)
                                    <tr class="text-center">
                                        <td class="text-black bg-white text-xs pl-2 pt-4"> <!-- Añadido padding a la izquierda -->
                                            <div class="flex justify-center items-center mb-6">
                                                @if($personaje->foto)
                                                    @if($personaje->estado)
                                                        <img src="{{ asset('storage/' . $personaje->foto) }}" alt="Foto de {{ $personaje->nombre }}" class="w-32 h-20 object-cover rounded-lg">
                                                    @else
                                                        <img src="{{ asset('storage/' . $personaje->foto) }}" alt="Foto de {{ $personaje->nombre }}" class="w-32 h-20 object-cover rounded-lg grayscale">
                                                    @endif
                                                @else
                                                    <p class="text-gray-500">No hay foto disponible</p>
                                                @endif
                                            </div>
                                        </td>

                                        <td class="pl-4 text-gray-300 font-semibold bg-white text-xs">
                                            <a href="{{ route('personajes.show', $personaje) }}" class="text-black hover:underline">
                                                {{ $personaje->nombre }}
                                            </a>
                                        </td>

                                        <td class="px-4 py-3 text-black bg-white text-xs">{{ $personaje->profesion }}</td>
                                        <td class="px-4 py-3 text-black bg-white text-xs">{{ $personaje->nacionalidad }}</td>
                                        <td class="px-4 py-3 text-black bg-white text-xs">
                                            <div>
                                                <x-primary-button>Morir</x-primary-button>
                                                <x-primary-button>Objetos</x-primary-buttonx>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </main>>
        </div>
</x-app-layout>
