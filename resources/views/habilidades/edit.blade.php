<x-app-layout>
    <div class="min-h-screen bg-gray-900 bg-opacity-80 flex items-center justify-center">
        <form method="POST" action="{{ route('habilidades.update', $habilidad) }}" class="bg-gray-800 bg-opacity-95 shadow-lg rounded-lg p-8 border border-green-700 w-full max-w-3xl space-y-6">
            @csrf
            @method('PATCH')
            <h2 class="text-3xl font-bold text-green-500 text-center mb-6">Editar habilidad</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="nombre" class="text-gray-300">Título</label>
                    <input type="text" name="nombre" id="nombre" value="{{ $habilidad->nombre }}" required placeholder="Nombre del habilidad" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300"/>
                </div>

                <div class="flex flex-col">
                    <label for="descripcion" class="text-gray-300">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" value="{{ $habilidad->descripcion }}" required placeholder="Descripcion del habilidad" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300"/>
                </div>

                <div class="flex flex-col">
                    <label for="acierto_Base" class="text-gray-300">Probabilidad de acierto</label>
                    <input type="text" name="acierto_base" id="acierto_base" value="{{ $habilidad->acierto_base }}" required placeholder="Probabilidad de acierto" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300"/>
                </div>

            </div>

            <div class="flex justify-center">
                <x-primary-button class="mt-4 text-center w-full md:w-auto">Actualizar habilidad</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
