<!-- resources/views/personajes/informacion.blade.php -->
<x-app-layout>
    <div class="mx-auto p-4 rounded-lg mt-4 shadow-lg w-full">
        <div class="bg-black p-4 rounded-lg text-white font-semibold">
            <h2 class="text-2xl font-bold text-center mb-4">{{ $personaje->nombre }}</h2>

            <!-- Imagen centrada -->
            <div class="flex justify-center items-center mb-6">
                <div>
                    @if ($personaje->foto)
                    <img src="{{ asset('storage/' . $personaje->foto) }}" alt="Foto de {{ $personaje->nombre }}"
                        class="w-48 h-48 rounded-lg mr-4">
                @else
                    <p class="text-gray-500">No hay foto disponible</p>
                @endif
                </div>

                <div class="flex flex-col">
                    <form action="{{ route('comentarios.store') }}" method="POST" class="flex flex-col">
                        @csrf
                        <input type="hidden" value="{{$personaje->id}}" name="personaje_id">
                        <label for="contenido" class="block text-gray-700 font-bold mb-2">Agregar un comentario:</label>
                        <textarea id="contenido" name="contenido" rows="4" class="w-full border text-black border-gray-300 rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Escribe tu comentario aquí..."></textarea>
                        <div class="flex justify-end mt-2">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Comentar</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="space-y-4 mt-4 w-3/12 mx-auto">
                @if ($personaje->comentarios->isEmpty())
                    <p class="text-gray-500">No hay comentarios disponibles para este personaje.</p>
                @else
                    @foreach ($personaje->comentarios as $comentario)
                        <div class="bg-gray-100 p-2 rounded-lg flex justify-between items-center">
                            <div>
                                <p class="text-black">{{ $comentario->created_at->format('d/m/Y') }}</p>
                                <p class="text-black">{{ $comentario->contenido }}</p>
                            </div>
                            <form method="POST" action="{{ route('comentarios.destroy', $comentario) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-2 m-2 text-xs bg-red-600 text-white rounded-lg shadow-md hover:bg-red-500 transition duration-200 transform hover:scale-[1.03]">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
