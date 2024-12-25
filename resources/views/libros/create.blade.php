<x-app-layout>
    <div class="min-h-screen bg-gray-900 bg-opacity-80 flex items-center justify-center">
        <form method="POST" action="{{ route('libros.store') }}" class="bg-gray-800 bg-opacity-90 shadow-lg rounded-lg p-8 border border-green-700 w-full max-w-3xl space-y-6">
            @csrf
            <h2 class="text-3xl font-bold text-green-500 text-center mb-6">Invocar Nuevo Tomo</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="titulo" class="text-gray-300">Título</label>
                    <input type="text" name="titulo" id="titulo" required placeholder="Título del libro" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                </div>

                <div class="flex flex-col">
                    <label for="autor" class="text-gray-300">Autor</label>
                    <input type="text" name="autor" id="autor" required placeholder="Nombre del autor" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                </div>

                <div class="flex flex-col">
                    <label for="anyo" class="text-gray-300">Año de publicación</label>
                    <input type="text" name="anyo" id="anyo" required placeholder="Año" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                </div>

                <div class="flex flex-col">
                    <label for="idioma" class="text-gray-300">Idioma</label>
                    <input type="text" name="idioma" id="idioma" placeholder="Idioma" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                </div>
            </div>

            <div class="flex flex-col">
                <label for="descripcion" class="text-gray-300">Descripción</label>
                <textarea name="descripcion" id="descripcion" placeholder="Descripción" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="coste_cordura" class="text-gray-300">Coste de Cordura</label>
                    <input type="text" name="coste_cordura" id="coste_cordura" placeholder="Coste en cordura" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                </div>

                <div class="flex flex-col">
                    <label for="coste_tiempo" class="text-gray-300">Coste de Tiempo</label>
                    <input type="text" name="coste_tiempo" id="coste_tiempo" placeholder="Coste en tiempo" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                </div>

                <div class="flex flex-col">
                    <label for="mitos" class="text-gray-300">+Mitos de Cthulhu</label>
                    <input type="text" name="mitos" id="mitos" placeholder="Mitos ganados" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                </div>

            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-300">Selecciona Hechizos (Opcional)</h3>
                <ul class="mt-2">
                    @foreach ($hechizos as $hechizo)
                        <li class="flex items-center space-x-2 text-gray-300">
                            <input type="checkbox" name="hechizos[]" value="{{ $hechizo->id }}" class="form-checkbox text-green-500 rounded">
                            <span>{{ $hechizo->nombre }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="flex justify-center">
                <x-primary-button class="mt-4 text-center w-full md:w-auto">Guardar Nuevo Libro</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
