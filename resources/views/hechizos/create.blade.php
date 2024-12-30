<x-app-layout>
    <div class="min-h-screen bg-gray-900 flex items-center justify-center p-6">
        <form method="POST" action="{{ route('hechizos.store') }}" class="bg-gray-800 bg-opacity-90 shadow-2xl rounded-lg p-8 border border-purple-700 w-full max-w-2xl space-y-6">
            @csrf
            <h2 class="text-4xl font-bold text-purple-400 text-center mb-6 font-serif tracking-wider">Grimorio Arcano</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="nombre" class="text-purple-300 mb-1">Nombre del Hechizo</label>
                    <input type="text" name="nombre" id="nombre" required placeholder="Ej: Invocación de Sombras" class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-500"/>
                </div>

                <div class="flex flex-col">
                    <label for="coste_mp" class="text-purple-300 mb-1">Coste Mágico</label>
                    <input type="text" name="coste" id="coste" required placeholder="Ej: 50 MP" class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-500"/>
                </div>

                <div class="flex flex-col">
                    <label for="coste_cordura" class="text-purple-300 mb-1">Coste Cordura</label>
                    <input type="text" name="coste_cordura" id="coste_cordura" required placeholder="Ej: 2d6" class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-500"/>
                </div>

                <div class="flex flex-col">
                    <label for="turnos" class="text-purple-300 mb-1">Tiempo de Ejecución</label>
                    <input type="text" name="turnos" id="turnos" required placeholder="Ej: 3 turnos" class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-500"/>
                </div>
            </div>

            <div class="flex flex-col">
                <label for="efecto" class="text-purple-300 mb-1">Efecto del Hechizo</label>
                <textarea name="efecto" id="efecto" rows="4" required placeholder="Describe los efectos arcanos del hechizo..." class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-500 resize-none"></textarea>
            </div>

            <div class="flex flex-col">
                <label for="intensificada" class="text-purple-300 mb-1">Magia Intensificada</label>
                <textarea name="intensificada" id="intensificada" rows="4" placeholder="Detalla los efectos de la versión potenciada..." class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-500 resize-none"></textarea>
            </div>

            <div class="flex flex-col">
                <label for="categoria" class="text-purple-300 mb-1">Categoría Arcana</label>
                @if ($categorias->isEmpty())
                    <p class="text-red-500">No hay categorías disponibles.</p>
                @else
                    <select name="categoria_id" id="categoria" class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" class="bg-gray-700">{{ ucfirst($categoria->nombre) }}</option>
                        @endforeach
                    </select>
                @endif
            </div>

            <div class="flex flex-col">
                <input hidden type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
            </div>

            <div class="flex justify-center">
                <button type="submit" class="mt-4 px-6 py-3 bg-purple-700 text-white font-bold rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 shadow-lg">
                    Inscribir Hechizo en el Grimorio
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
