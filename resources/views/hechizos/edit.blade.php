<x-app-layout>
    <div class="min-h-screen bg-gray-900 flex items-center justify-center p-6">
        <form method="POST" action="{{ route('hechizos.update', $hechizo) }}" class="bg-gray-800 bg-opacity-90 shadow-2xl rounded-lg p-8 border border-purple-700 w-full max-w-2xl space-y-6">
            @method('PUT')
            @csrf
            <h2 class="text-4xl font-bold text-purple-400 text-center mb-6 font-serif tracking-wider">Actualizar Hechizo</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label for="nombre" class="text-purple-300 mb-1">Nombre</label>
                    <input value="{{ $hechizo->nombre }}" type="text" name="nombre" id="nombre" required placeholder="Nombre del hechizo" class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-500"/>
                </div>

                <div class="flex flex-col">
                    <label for="turnos" class="text-purple-300 mb-1">Turnos</label>
                    <input type="text" value="{{ $hechizo->turnos }}" name="turnos" id="turnos" required placeholder="Tiempo de ejecución" class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-500"/>
                </div>

                <div class="flex flex-col">
                    <label for="coste" class="text-purple-300 mb-1">Coste Mágico</label>
                    <input type="text" value="{{ $hechizo->coste }}" name="coste" id="coste" required placeholder="Ej: 50 MP" class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-500"/>
                </div>

                <div class="flex flex-col">
                    <label for="coste_cordura" class="text-purple-300 mb-1">Coste Cordura</label>
                    <input type="text" value="{{ $hechizo->coste_cordura }}" name="coste_cordura" id="coste_cordura" required placeholder="Ej: 2d6" class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-500"/>
                </div>
            </div>

            <div class="flex flex-col">
                <label for="efecto" class="text-purple-300 mb-1">Efectos</label>
                <textarea name="efecto" id="efecto" rows="4" required placeholder="Describe los efectos del hechizo..." class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-500 resize-none">{{ $hechizo->efecto }}</textarea>
            </div>

            <div class="flex flex-col">
                <label for="intensificada" class="text-purple-300 mb-1">Magia Intensificada</label>
                <textarea name="intensificada" id="intensificada" rows="4" required placeholder="Describe la versión potenciada..." class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 placeholder-gray-500 resize-none">{{ $hechizo->intensificada }}</textarea>
            </div>

            <div class="flex flex-col">
                <label for="categoria" class="text-purple-300 mb-1">Categoría</label>
                <select name="categoria" id="categoria" class="mt-1 p-2 bg-gray-700 text-purple-300 rounded-md border border-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->nombre }}" {{ $hechizo->categoria === $categoria->nombre ? 'selected' : '' }}>
                            {{ ucfirst($categoria->nombre) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col">
                <input hidden type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
            </div>

            <div class="flex justify-center">
                <button type="submit" class="mt-4 px-6 py-3 bg-purple-700 text-white font-bold rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 shadow-lg">
                    Actualizar Hechizo
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
