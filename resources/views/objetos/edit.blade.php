<x-app-layout>
    <div class="min-h-screen bg-gray-900 bg-opacity-80 flex items-center justify-center">
        <form method="POST" action="{{ route('objetos.update', $objeto) }}" class="bg-gray-800 bg-opacity-95 shadow-lg rounded-lg p-8 border border-green-700 w-full max-w-3xl space-y-6">
            @csrf
            @method('PATCH')
            <h2 class="text-3xl font-bold text-green-500 text-center mb-6">Editar objeto</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="denominacion" class="text-gray-300">Título</label>
                    <input type="text" name="denominacion" id="denominacion" value="{{ $objeto->denominacion }}" required placeholder="Título del objeto" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300"/>
                </div>

                <div class="flex flex-col">
                    <label for="descripcion" class="text-gray-300">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" value="{{ $objeto->descripcion }}" required placeholder="Descripcion del objeto" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300"/>
                </div>

                <div class="flex flex-col">
                    <label for="efecto" class="text-gray-300">Efecto</label>
                    <input type="text" name="efecto" id="efecto" value="{{ $objeto->efecto }}" required placeholder="Efecto si lo tuviese" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300"/>
                </div>

                <div class="flex flex-col">
                    <label for="valor" class="text-gray-300">Valor</label>
                    <input type="text" name="valor" id="valor" value="{{ $objeto->valor }}" required placeholder="Valor monetario" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300"/>
                </div>
            </div>

            <div class="flex justify-center">
                <x-primary-button class="mt-4 text-center w-full md:w-auto">Actualizar objeto</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
