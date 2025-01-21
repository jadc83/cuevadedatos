<x-app-layout>
    <div class="min-h-screen bg-gray-900 p-6" style="background-image: url('/images/cthulhu.jpg'); background-size: cover; background-position: center;">
        <div class="w-full max-w-5xl mx-auto p-6 bg-transparent rounded-lg">
            <main class="bg-transparent">
                <!-- Formulario para añadir un nuevo libro -->
                <form method="POST" action="{{ route('habilidades.store') }}" class="bg-gray-800 bg-opacity-90 shadow-lg rounded-lg p-8 border border-green-700 w-full max-w-3xl mx-auto space-y-6">
                    @csrf
                    <h2 class="text-3xl font-bold text-green-500 text-center mb-6">Desarrollar nueva habilidad</h2>

                        <div class="flex flex-col">
                            <label for="nombre" class="text-gray-300">Nombre</label>
                            <input type="text" name="nombre" id="nombre" required placeholder="Nombre de la habilidad" class="mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"/>
                        </div>
                    <div class="flex flex-col">
                        <label for="descripcion" class="text-gray-300">Descripcion</label>
                        <textarea type="text" name="descripcion" id="descripcion" placeholder="Describe la habilidad" class="h-32 mt-1 p-2 bg-gray-700 text-gray-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
                    </div>
                    <div class="flex flex-col">
                        <label for="acierto_base" class="text-gray-300">Pertenece a:</label>
                        <select  id="objeto_id" name="objeto_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" {{ old('objeto_id', $objeto_id ?? '') == '' ? 'selected' : '' }}>Selecciona un objeto</option>
                            @foreach ($objetos as $objeto)
                                <option value="{{ $objeto->id }}" {{ old('objeto_id', $objeto_id ?? '') == $objeto->id ? 'selected' : '' }}>
                                    {{ $objeto->denominacion }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-center">
                        <x-primary-button class="mt-4 text-center w-full md:w-auto">Fabricar nuevo objeto</x-primary-button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</x-app-layout>
